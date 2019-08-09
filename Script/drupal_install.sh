#! /bin/bash
cd /home/neslee/sites/
wget https://ftp.drupal.org/files/projects/drupal-8.5.6.tar.gz
tar -xvf drupal-8.5.6.tar.gz
rm -rf drupal-8.5.6.tar.gz

						####---- Folder Creation  ----####
check_foldername_function()
{
if [ -e $folder_name ]
then
    echo "--- Folder Name already Exists , Please Enter Again ---"
    input_folder_function
else
    mv drupal-8.5.6 $folder_name
    cd $folder_name/sites/default/
    cp default.settings.php settings.php
    chmod 666 settings.php
    mkdir files
    chmod -R 777 files/
fi
}
input_folder_function()
{
echo -e "Enter Folder Name : \c"
read folder_name
check_foldername_function
}
input_folder_function
                                               ####---- End Folder Creation ----####

                                               ####---- Database Creation ----####
check_database_function() {
if [ "`mysql -u root -p$database_password -e 'show databases;' | grep ${database_name}`" == "${database_name}" ]; then
  echo "--- Database Already Exists , Please Enter New Name ---"
  input_database_function
else
  mysqladmin -u root -p$database_password create $database_name
  echo "--- Database Created Sucessfully ---"
fi
}
input_database_function()
{
echo -e "Enter Database Name : \c"
read database_name
echo -e "Enter Password : \c"
read database_password
check_database_function
}
input_database_function
                                              ####---- End Database Creation ----####

                                              ####---- Server Creation ----####

check_server_function()
{
if [ -e $server_name ]
then
  echo "--- Server Name Already Exists , Please Enter Again ---"
  input_server_function
else
  sudo cp default $server_name
  root_directory=/home/neslee/sites/$folder_name
  sudo sed -i 's/localhost/'$server_name'/' $server_name
  sudo sed -i 's|/var/www/html|'$root_directory'|g' $server_name
  sudo ln -s /etc/nginx/sites-available/$server_name /etc/nginx/sites-enabled/
  cd /etc/
  sudo sed -i "2 a 127.0.0.1       $server_name" hosts
  sudo service nginx restart
fi
}
input_server_function()
{
cd /etc/nginx/sites-available/
echo -e "Enter Server Name : \c"
read server_name
check_server_function
}
input_server_function

                                             ####---- End Server Creation ----####
