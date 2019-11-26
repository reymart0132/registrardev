  console.clear();
  var startDateInp = document.getElementById('startDate');
  var endDateInp = document.getElementById('endDate');

  function compareDates() {
    var startDateTime = new Date(startDateInp.value).getTime();
    var endDateTime = new Date(endDateInp.value).getTime();

    console.log(startDateTime, endDateTime);

    if (startDateTime > endDateTime) {
      alert('Invalid Date!');
    }
  }

  startDate.addEventListener('input', compareDates);
  endDate.addEventListener('input', compareDates);

//
console.clear();
var startDateInp2 = document.getElementById('startDate2');
var endDateInp2 = document.getElementById('endDate2');

function compareDates2() {
  var startDateTime2 = new Date(startDateInp2.value).getTime();
  var endDateTime2 = new Date(endDateInp2.value).getTime();

  console.log(startDateTime2, endDateTime2);

  if (startDateTime2 > endDateTime2) {
    alert('Invalid Date!');
  }
}

startDate2.addEventListener('input', compareDates2);
endDate2.addEventListener('input', compareDates2);

//

console.clear();
var startDateInp3 = document.getElementById('startDate3');
var endDateInp3 = document.getElementById('endDate3');

function compareDates3() {
  var startDateTime3 = new Date(startDateInp3.value).getTime();
  var endDateTime3 = new Date(endDateInp3.value).getTime();

  console.log(startDateTime3, endDateTime3);

  if (startDateTime3 > endDateTime3) {
    alert('Invalid Date!');
  }
}

startDate3.addEventListener('input', compareDates3);
endDate3.addEventListener('input', compareDates3);
//

console.clear();
var startDateInp4 = document.getElementById('startDate4');
var endDateInp4 = document.getElementById('endDate4');

function compareDates4() {
  var startDateTime4 = new Date(startDateInp.value).getTime();
  var endDateTime4 = new Date(endDateInp.value).getTime();

  console.log(startDateTime4, endDateTime4);

  if (startDateTime > endDateTime) {
    alert('Invalid Date!');
  }
}

startDate4.addEventListener('input', compareDates4);
endDate4.addEventListener('input', compareDates4);
//
console.clear();
var startDateInp5 = document.getElementById('startDate5');
var endDateInp5 = document.getElementById('endDate5');

function compareDates5() {
  var startDateTime5 = new Date(startDateInp5.value).getTime();
  var endDateTime5 = new Date(endDateInp5.value).getTime();

  console.log(startDateTime5, endDateTime5);

  if (startDateTime5 > endDateTime5) {
    alert('Invalid Date!');
  }
}

startDate5.addEventListener('input', compareDates5);
endDate5.addEventListener('input', compareDates5);
