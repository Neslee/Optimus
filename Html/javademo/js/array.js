// arr is Array Declartion
// Author : Neslee Canil Pinto
// Date : 08/08/2018 10:51 AM

var arr = ['Hi', 'My', 'Name', 'Is', 'Neslee'];


// Find Length of Array
document.getElementById('len__input').value = arr;
function array__len__fun() {
    document.getElementById('len__output').value = arr.length;
}

// Will get specified Array Element
document.getElementById('proto__input').value = arr;
function array__proto__fun() {
    var proto_ele=document.getElementById('proto__enter__input').value;
    if(proto_ele==""){
        alert('Please Enter Position');
        return false;
    }
    if (!Array.prototype.first) {
        Array.prototype.first = function () {
            return this[proto_ele];
            //   return this[this.length-1];
        }
    }
    document.getElementById('proto__output').value = arr.first();
}


// from__fun() Function will create a new array
function from__fun() {
    var from_arr = document.getElementById('from__input').value;
    if (from_arr == "") {
        alert("Please Enter Array From Input");
        return false;
    }
    document.getElementById('from__output').value = Array.from(from_arr);
}
document.getElementById('from__no__output').value = Array.from([1, 2, 4], x => x + x);

// isarray__fun Function will check whether entered input is array or Not
function isarray__fun() {
    var isarray_arr = document.getElementById('isarray__input').value;
    if (isarray_arr == "") {
        alert("Please Enter Is Array Input");
        return false;
    }
    document.getElementById('isarray__output').value = Array.isArray(isarray_arr);
    document.getElementById('isarray__no__output').value = Array.isArray([1, 2, 3]);
}

// arrayof__fun Function will create Element Specified
var arrayof_arr = [1, 2, 3, 4];
document.getElementById('arrayof__input').value = arrayof_arr;

function arrayof__fun() {
    document.getElementById('arrayof__output').value = Array.of(arrayof_arr);
}

// array__concat__fun Function will Concat two arrays
var array__concat1 = [1, 2, 3, 4];
var array__concat2 = [9, 8, 7, 6];
var concat__answer = array__concat1.concat(array__concat2);
document.getElementById('array__concat__input1').value = array__concat1;
document.getElementById('array__concat__input2').value = array__concat2;

function array__concat__fun() {
    document.getElementById('array__concat__output').value = concat__answer;
}

// array__copywithin__fun 
var array__copy = ['a', 'b', 'c', 'd', 'e'];
document.getElementById('array__copy__input').value = array__copy;

var copy__answer = array__copy.copyWithin(1, 3);
function array__copy__fun() {
    document.getElementById('array__copy__output').value = copy__answer;
}


// array__entries__fun 
var array__entries = ['a', 'b', 'c'];
document.getElementById('array__entries__input').value = array__entries;

var iterator1 = array__entries.entries();

function array__entries__fun() {
    document.getElementById('array__entries__output1').value = iterator1.next().value;
    document.getElementById('array__entries__output2').value = iterator1.next().value;
}

// array__every__fun 
var array__every = [1, 2, 3, 4, 5, 6];
document.getElementById('array__every__input').value = array__every;

function array__every__fun() {
    function isBelowThreshold(currentValue) {
        return currentValue < 40;
    }
    document.getElementById('array__every__output').value = array__every.every(isBelowThreshold)
}

// array__fill__fun 
var array__fill = [1, 2, 3, 4];
document.getElementById('array__fill__input').value = array__fill;

function array__fill__fun() {

    document.getElementById('array__fill__output1').value = array__fill.fill(0, 2, 4);
    document.getElementById('array__fill__output2').value = array__fill.fill(5, 1);
}

// array__filter__fun
var array__filter = ['Ronaldo', 'Salah', 'Bale', 'Pogba', 'Ali'];
document.getElementById('array__filter__input').value = array__filter;

function array__filter__fun() {
    var range_limit = document.getElementById('array__filter__range').value;
    if (range_limit == "") {
        alert('Enter Filter Range');
        return false;
    }
    const result = array__filter.filter(word => word.length > range_limit);
    document.getElementById('array__filter__output').value = result;
}

// array__find__fun
var array__find = [10, 15, 20, 50, 100];
document.getElementById('array__find__input').value = array__find;

function array__find__fun() {
    var find_ele = document.getElementById('array__find__ele').value;
    if (find_ele == "") {
        alert('Enter Element');
        return false;
    }
    var search_result = array__find.find(function (element) {
        return element > find_ele;
    });
    document.getElementById('array__find__output').value = search_result;
}

// array__find__index 
var array__find = [10, 15, 20, 50, 100];
document.getElementById('array__findindex__input').value = array__find;

function array__findindex__fun() {
    var find_ele = document.getElementById('array__findindex__ele').value;
    if (find_ele == "") {
        alert('Enter Element');
        return false;
    }
    function findindexno(element) {
        return element > find_ele;
    }
    document.getElementById('array__findindex__output').value = array__find.findIndex(findindexno);
}

// array__foreach
var array__foreach = [10, 15, 20, 50, 100];
document.getElementById('array__foreach__input').value = array__foreach;
function array__foreach__fun() {
    array__foreach.forEach(function (element) {
        document.getElementById('array__foreach__output').value = element;
    });
}

// array__includes
var array__includes = ['cat', 'dog', 'bat'];
document.getElementById('array__includes__input').value = array__includes;
function array__includes__fun() {
    document.getElementById('array__includes__output').value = array__includes.includes('bat');
}

// array__indexof
var array__indexof = ['ronaldo', 'bale', 'salah', 'ronaldo'];
document.getElementById('array__indexof__input').value = array__indexof;
function array__indexof__fun() {
    document.getElementById('array__indexof__output').value = array__indexof.indexOf('ronaldo',2);
}

// array__join
var array__indexof = ['ronaldo', 'bale', 'salah'];
document.getElementById('array__join__input').value = array__indexof;
function array__join__fun() {
    document.getElementById('array__join__output1').value = array__indexof.join('-');
    document.getElementById('array__join__output2').value = array__indexof.join('*');
}

// array__key
var array__key = ['ronaldo', 'bale', 'salah'];
document.getElementById('array__key__input').value = array__key;
function array__key__fun() {
    var iterator = array__key.keys();
    for (let key of iterator) {
        document.getElementById('array__key__output').value = key;
    }
}

// array__lastindexof
var array__lastindex = ['ronaldo', 'bale', 'salah', 'ronaldo'];
document.getElementById('array__lastindex__input').value = array__lastindex;
function array__lastindex__fun() {
    document.getElementById('array__lastindex__output').value = array__lastindex.lastIndexOf('ronaldo');
}

// array__map__fun
var array__map = [2, 4, 6, 8, 10];
document.getElementById('array__map__input').value = array__map;
function array__map__fun() {
    document.getElementById('array__map__output').value = array__map.map(x => x * 2);
}

// array__pop__fun
var array__pop = ['ronaldo', 'bale', 'marcelo', 'kane', 'salah'];
document.getElementById('array__pop__input').value = array__pop;
function array__pop__fun() {
    document.getElementById('array__pop__output').value = array__pop.pop();
    document.getElementById('array__rest__output').value = array__pop;
}

// array__push__fun
var array__push = ['ronaldo', 'bale', 'marcelo', 'kane', 'salah'];
document.getElementById('array__push__input').value = array__push;
function array__push__fun() {
    var push_var = document.getElementById('array__push__output').value;
    if (push_var == "") {
        alert('Please Enter Element to push');
        return false;
    }
    array__push.push(push_var);
    document.getElementById('array__pushall__output').value = array__push;
}

// array__reduce__fun
var array__reduce = [1, 2, 3, 4];
document.getElementById('array__reduce__input').value = array__reduce;
function array__reduce__fun() {
    const reducer = (accumulator, currentValue) => accumulator + currentValue;
    // document.getElementById('array__reduce__output').value = array__reduce.reduce(reducer,5);
    document.getElementById('array__reduce__output').value = array__reduce.reduce(reducer);
}

// array__reduceright__fun
var array__reduceright = [[0, 1], [2, 3], [4, 5]];
document.getElementById('array__reduceright__input').value = array__reduceright;
function array__reduceright__fun() {
    const array__reduceright = [[0, 1], [2, 3], [4, 5]].reduceRight(
        (accumulator, currentValue) => accumulator.concat(currentValue)
    );
    document.getElementById('array__reduceright__output').value = array__reduceright;
}

// array__reverse__fun
var array__reverse = ['ronaldo', 'bale', 'marcelo', 'kane', 'salah'];
document.getElementById('array__reverse__input').value = array__reverse;
function array__reverse__fun() {
    document.getElementById('array__reverse__output').value = array__reverse.reverse();
}

// array__shift__fun
var array__shift = [1, 2, 3, 4];
document.getElementById('array__shift__input').value = array__shift;
function array__shift__fun() {
    var firstElement = array__shift.shift();
    document.getElementById('array__shift__output').value = array__shift;
    document.getElementById('array__first__output').value = firstElement;
}

// array__slice__fun
var array__slice = ['ronaldo', 'bale', 'marcelo', 'kane', 'salah'];
document.getElementById('array__slice__input').value = array__slice;
function array__slice__fun() {
    document.getElementById('array__slice__output').value = array__slice.slice(2, 4);
}

// array__some__fun
var array__some = [1, 2, 3, 4, 5];
document.getElementById('array__some__input').value = array__some;
function array__some__fun() {
    var even = function (element) {
        return element % 2 === 0;
    };
    document.getElementById('array__some__output').value = array__some.some(even);
}

// array__sort__fun
var array__sort = ['Max', 'Jack', 'James', 'Dam', 'Den'];
document.getElementById('array__sort__input').value = array__sort;
function array__sort__fun() {
    array__sort.sort();
    document.getElementById('array__sort__output').value = array__sort;
}

// array__splice__fun
var array__splice = ['Max', 'Jack', 'James', 'Dam', 'Den'];
document.getElementById('array__splice__input').value = array__splice;
function array__splice__fun() {
    array__splice.splice(4, 0, 'Mass');
    document.getElementById('array__splice__output').value = array__splice;
}

// array__tolocale__fun
var array__tolocale = [1, 'Session', new Date('27 Sep 1994 10:10:00 UTC')];
document.getElementById('array__tolocale__input').value = array__tolocale;
function array__tolocale__fun() {
    var localeString = array__tolocale.toLocaleString('en', { timeZone: "UTC" });
    document.getElementById('array__tolocale__output').value = localeString;
}

// array__tostring__fun
var array__tostring = [1, 2, 'Max', 'Well'];
document.getElementById('array__tostring__input').value = array__tostring;
function array__tostring__fun() {
    document.getElementById('array__tostring__output').value = array__tostring.toString();
}


// array__unshift__fun
var array__unshift = [44, 55, 66, 77];
document.getElementById('array__unshift__input').value = array__unshift;
function array__unshift__fun() {
    array__unshift.unshift(22, 33);
    document.getElementById('array__unshift__output').value = array__unshift;
}


// array__values__fun
var array__values = ['Max', 'Well', 'Brett', 'Lee'];
document.getElementById('array__values__input').value = array__values;
function array__values__fun() {
    const iterator = array__values.values();
    for (const value of iterator) {
        document.getElementById('array__values__output').value = value;
    }

}