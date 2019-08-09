// Author : Neslee Canil Pinto
// Date : 08/08/2018 10:51 AM


// Find Length of String
function string__len__fun() {
    var len_input=document.getElementById('len__input').value;
    if(len_input==""){
        alert('Please Enter String');
    }
    document.getElementById('len__output').value = len_input.length;
}

// string__fromcharcode__fun
document.getElementById('string__fromcharcode__input').value=[65, 66, 67, 68];
function string__fromcharcode__fun() {
    document.getElementById('string__fromcharcode__output').value = String.fromCharCode(65, 66, 67,68);
}

// string__fromcharcode__fun
function string__fromcodepoint__fun() {
    var code_input=document.getElementById('string__fromcodepoint__input').value;
    if(code_input==""){
        alert('Please Enter Code Point Input');
        return false;
    }
    document.getElementById('string__fromcodepoint__output').value = String.fromCodePoint(code_input);
}

// string__charat__fun
function string__charat__fun() {
    var charat_input=document.getElementById('string__charat__input').value;
    var charat_pos=document.getElementById('string__charat__input1').value;
    if(charat_input=="" || charat_pos==""){
        alert('Please Enter CharAt Input');
        return false;
    }
    document.getElementById('string__charat__output').value =  charat_input.charAt(charat_pos);
}

// string__charcodeat__fun
function string__charcodeat__fun() {
    var charcodeat_input=document.getElementById('string__charcodeat__input').value;
    var charcodeat_pos=document.getElementById('string__charcodeat__input1').value;
    if(charcodeat_input=="" || charcodeat_pos==""){
        alert('Please Enter CharCodeAt Input');
        return false;
    }
    document.getElementById('string__charcodeat__output').value =  charcodeat_input.charCodeAt(charcodeat_pos);
}

// string__charcodeat__fun
function string__codepointat__fun() {
    var codepointat_input=document.getElementById('string__codepointat__input').value;
    var codepointat_pos=document.getElementById('string__codepointat__input1').value;
    if(codepointat_input=="" || codepointat_pos==""){
        alert('Please Enter CodePointAt Input');
        return false;
    }
    document.getElementById('string__codepointat__output').value =  codepointat_input.codePointAt(codepointat_pos);
}


// string__concat__fun
function string__concat__fun() {
    var concat1=document.getElementById('string__concat__input').value;
    var concat2=document.getElementById('string__concat__input1').value;
    if(concat1=="" || concat2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__concat__output').value =  concat1.concat(' ',concat2);
}

// string__endswith__input
function string__endswith__fun() {
    var endswith1=document.getElementById('string__endswith__input').value;
    var endswith2=document.getElementById('string__endswith__input1').value;
    if(endswith1=="" || endswith2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__endswith__output').value = endswith1.endsWith(endswith2);
}

// string__includes__fun
function string__includes__fun() {
    var includes1=document.getElementById('string__includes__input').value;
    var includes2=document.getElementById('string__includes__input1').value;
    if(includes1=="" || includes2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__includes__output').value = includes1.includes(includes2);
}

// string__indexof__fun
function string__indexof__fun() {
    var indexof1=document.getElementById('string__indexof__input').value;
    var indexof2=document.getElementById('string__indexof__input1').value;
    if(indexof1=="" || indexof2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__indexof__output').value = indexof1.indexOf(indexof2);
}

// string__lastindexof__fun
function string__lastindexof__fun() {
    var lastindexof1=document.getElementById('string__lastindexof__input').value;
    var lastindexof2=document.getElementById('string__lastindexof__input1').value;
    if(lastindexof1=="" || lastindexof2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__lastindexof__output').value = lastindexof1.lastIndexOf(lastindexof2);
}

// string__match__fun
function string__match__fun() {
    var match1=document.getElementById('string__match__input').value;
    var match2=document.getElementById('string__match__input1').value;
    if(match1=="" || match2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__match__output').value = match1.match(match2);
}


// string__padend__fun
function string__padend__fun() {
    var padend1=document.getElementById('string__padend__input').value;
    var padend2=document.getElementById('string__padend__input1').value;
    var padend3=document.getElementById('string__padend__input2').value;
    if(padend1=="" || padend2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__padend__output').value = padend1.padEnd(padend2,padend3);
}


// string__repeat__fun
function string__repeat__fun() {
    var repeat1=document.getElementById('string__repeat__input').value;
    var repeat2=document.getElementById('string__repeat__input1').value;
    if(repeat1=="" || repeat2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__repeat__output').value = repeat1.repeat(repeat2); 
}

// string__replace__fun
function string__replace__fun() {
    var replace1=document.getElementById('string__replace__input').value;
    var replace2=document.getElementById('string__replace__input1').value;
    var replace3=document.getElementById('string__replace__input2').value;
    if(replace1=="" || replace2=="" || replace3==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__replace__output').value = replace1.replace(replace2, replace3);
}

// string__search__fun
function string__search__fun() {
    var search1=document.getElementById('string__search__input').value;
    var search2=document.getElementById('string__search__input1').value;
    if(search1=="" || search2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__search__output').value = search1.search(search2);
}


// string__slice__fun
function string__slice__fun() {
    var slice1=document.getElementById('string__slice__input').value;
    var slice2=document.getElementById('string__slice__input1').value;
    var slice3=document.getElementById('string__slice__input2').value;
    if(slice1=="" || slice2=="" || slice3==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__slice__output').value = slice1.slice(slice2,slice3);
}

// string__split__fun
function string__split__fun() {
    var split1=document.getElementById('string__split__input').value;
    var split2=document.getElementById('string__split__input1').value;
    if(split1=="" || split2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__split__output').value = split1.split(',');
}

// string__startswith__fun
function string__startswith__fun() {
    var startswith1=document.getElementById('string__startswith__input').value;
    var startswith2=document.getElementById('string__startswith__input1').value;
    if(startswith1=="" || startswith2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__startswith__output').value = startswith1.startsWith(startswith2);
}

// string__substring__fun
function string__substring__fun() {
    var substring1=document.getElementById('string__substring__input').value;
    var substring2=document.getElementById('string__substring__input1').value;
    var substring3=document.getElementById('string__substring__input2').value;
    if(substring1=="" || substring2==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__substring__output').value = substring1.substring(substring2,substring3);
}


// string__tolocalelowercase__fun
function string__tolocalelowercase__fun() {
    var tolocalelowercase=document.getElementById('string__tolocalelowercase__input').value;
    if(tolocalelowercase==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__tolocalelowercase__output').value = tolocalelowercase.toLocaleLowerCase();
}

// string__tolocaleuppercase__fun
function string__tolocaleuppercase__fun() {
    var tolocaleuppercase=document.getElementById('string__tolocaleuppercase__input').value;
    if(tolocaleuppercase==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__tolocaleuppercase__output').value = tolocaleuppercase.toLocaleUpperCase();
}


// string__trim__fun
function string__trim__fun() {
    var trim_var=document.getElementById('string__trim__input').value;
    if(trim_var==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__trim__output').value = trim_var.trim();
}

// string__trimend__fun
function string__trimend__fun() {
    var trimend_var=document.getElementById('string__trimend__input').value;
    if(trimend_var==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__trimend__output').value = trimend_var.trimEnd();
}

// string__trimstart__fun
function string__trimstart__fun() {
    var trimstart_var=document.getElementById('string__trimstart__input').value;
    if(trimstart_var==""){
        alert('Please Enter String');
        return false;
    }
    document.getElementById('string__trimstart__output').value = trimstart_var.trimStart();
}