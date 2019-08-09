// Calculator Functionality
// Author : Neslee Canil Pinto
// Date: 09/08/2018 10:00AM

// cleartext() Function Will Set Textbox Value To 0
function cleartext() {
    document.getElementById("sum").value = "0";
    document.getElementById("adder").value = "";
}

// calculate(val) Function will Get Input From User and Append It
// userinput will have the data which has been inserted from user
function calculate(userinput) {
    document.getElementById("adder").value += userinput;
}

// answer() Function will calculate the Input Values
// sum will hold the final answer returned from ans_calculate() Function
function answer() {
    var sum = ans_calculate(calculator(document.getElementById("adder").value));
    document.getElementById("sum").value = sum; // Display answer in sum textbox
}

// calculator(arr_input) Function will Seprate Numbers and Special Characters to Array 
// arr_input will have the input passed from answer() Function
function calculator(arr_input) {
    var reg_exp = /[0-9.]/;  // reg_exp will hold number from 0 to 9 and . in it
    var arr_answer = [];  // arr_answer is array which holds data which we will push in it
    var arr_data = '';  // arr_data will hold seprated data like array and special characters
    for (var i = 0; i < arr_input.length; i++) {  // i will increment the Loop
        if (arr_input[i].match(reg_exp)) { // This Condition will Check if arr_input[ith position] match from 0 to 9 and .
            arr_data += arr_input[i]; // arr_input[i] position value will append to to arr_data variable
        }
        else {
            if (arr_data == '' && arr_input[i] == '-') // Will Check if arr_data is null and arr_input[i] is - symbol
            {
                arr_data = '-'; // arr_data will be hold - symbol
            }
            else {
                arr_answer.push(arr_data, arr_input[i]); // arr_data and arr_input[i] will be pushed to arr_answer
                arr_data = ''; // arr_data will be assigned to null
            }
        }
    }
    arr_answer.push(arr_data);   // arr_data will be pushed to arr_answer
    return arr_answer;  // Will return  arr_answer array
}

// ans_calculate(arr_answer) Function will Calculate Addition , Substraction, Multiplication and other Operations
// arr_answer will hold value passed from answer() function
function ans_calculate(arr_answer) {

    var result; // result variable holds opertions output
    while (arr_answer.length > 1) {  // while will check if arr_answer is greater than 1
        var operand1 = arr_answer.shift(); // Will shift first value from arr_answer to operand1
        var operator = arr_answer.shift(); // Will shift first value from arr_answer to operator
        var operand2 = arr_answer.shift(); // Will shift first value from arr_answer to operand2
        operand1 = parseFloat(operand1); // Will convert operand1 to float
        operand2 = parseFloat(operand2); // Will convert operand2 to float

        switch (operator) {  // Switch Case for operator
            case '+':                                   // Addition Operation
                result = operand1 + operand2;           // result will hold Addition result
                arr_answer.unshift(result);
                break;
            case '-':                                   // Substract Operation
                result = operand1 - operand2;           // result will hold Substraction result
                arr_answer.unshift(result);
                break;
            case '/':                                   // Divide Operation
                if (operand2 == 0) {                    // Check if operand2 is 0
                    return operand1 + ' / ' + operand2 + ' Not Possible';  
                }
                result = operand1 / operand2;           // result will hold Division result
                arr_answer.unshift(result);
                break;
            case '*':                                   // Multiply Operation
                result = operand1 * operand2;           // result will hold Multiplication result
                arr_answer.unshift(result);
                break;
            case '%':                                   // Modules Operation
                if (operand2 == 0) {                     // Check if operand2 is 0
                    return operand1 + ' % ' + operand2 + ' Not Possible'; 
                }
                result = operand1 % operand2;           // result will hold Modules result
                arr_answer.unshift(result);
                break;
            default:
                null;
        }
    }
    return arr_answer;  // returns arr_answer to answer() Function
}