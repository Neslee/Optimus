// main section background color

function main_function() {

   var body_color=document.getElementsByTagName("BODY")[0];
   body_color.classList.add("body_style");

   var section_data=document.getElementById('main_section');  // Main Section

   var header=document.createElement("DIV");  // Top Line Div
   section_data.appendChild(header);
   header.classList.add("col-md-12","header");

   var heading=document.createElement("DIV");  // Heading Section
   section_data.appendChild(heading);
   heading.classList.add("col-md-4","heading");

   var left_header=document.createElement("SPAN");  //Top Left Heading
   heading.appendChild(left_header);
   left_header.innerHTML="The Modernist";
   left_header.classList.add("moderist");

   var left_header_text=document.createElement("SPAN");  // Top Left Content
   heading.appendChild(left_header_text);
   left_header_text.innerHTML="Free Psd Website Template";
   left_header_text.classList.add("psd");

   var menu=document.createElement("DIV");  // Menus Section
   section_data.appendChild(menu);
   menu.classList.add("col-md-8","menus");

   var ul=document.createElement("UL");  // Menus Ul
   menu.appendChild(ul);
   ul.classList.add("ul");

   var li=document.createElement("LI");  //Menus Li
   ul.appendChild(li);
   li.classList.add("li");

   var a=document.createElement("A");  // Link For Home
   li.appendChild(a);
   a.innerHTML="HOME";
   a.href = "dom.html";
   a.classList.add("links");

   var a=document.createElement("A");  // Link For Style Demo
   li.appendChild(a);
   a.innerHTML="STYLE DEMO";
   a.href = "dom.html";
   a.classList.add("links");

   var a=document.createElement("A");  // Link For FULLWIDTH
   li.appendChild(a);
   a.innerHTML="FULLWIDTH";
   a.href = "dom.html";
   a.classList.add("links");

   var a=document.createElement("A");  // Link For DROPDOWN
   li.appendChild(a);
   a.innerHTML="DROPDOWN";
   a.href = "dom.html";
   a.classList.add("links");

   var a=document.createElement("A");  // Link For PORTFOLIO
   li.appendChild(a);
   a.innerHTML="PORTFOLIO";
   a.href = "dom.html";
   a.classList.add("links");

   var a=document.createElement("A");  //  Link For GALLERY
   li.appendChild(a);
   a.innerHTML="GALLERY";
   a.href = "dom.html";
   a.classList.add("links");


   var left_content=document.createElement("DIV");  // Left Section
   section_data.appendChild(left_content);
   left_content.classList.add("col-md-7","left-content");

   var h1=document.createElement("H1"); // Left Header
   left_content.appendChild(h1);
   h1.innerHTML="Cursus penati <br> saccum nulla.";
   h1.classList.add("left_heading");

   var p=document.createElement("P");  // Left Paragraph
   left_content.appendChild(p);
   p.innerHTML="Nullamlacus dui ipsum conseque loborrtis non euisque <br> morbi penas dapibulum orna.Urnaultrices quis <br> curabitur phasellentesque congue magnis vestibulum <br> quismodo nulla et feuglat adipiscinia pellentum leo.";
   p.classList.add("para");

   var btn=document.createElement("BUTTON"); // Left Header
   left_content.appendChild(btn);
   btn.innerHTML="Read More >>";
   btn.classList.add("button");


   var right_content=document.createElement("DIV");  // Image Section
   section_data.appendChild(right_content);
   right_content.classList.add("col-md-5","right-content");

   var image=document.createElement("IMAGE");  // Image
   right_content.appendChild(image);
   image.innerHTML="<img src='images/neslee.jpg' class='image'>";
}