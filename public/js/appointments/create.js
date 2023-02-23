 let $doctor,$date,$specialty,$hours;
 let iRadio;

 const noHoursAlert=`<div class="alert alert-danger"
 role="alert"><strong>Lo sentimos!</strong>
 No se encontraron horarios disponibles
 </div>`
 


$(function(){
$specialty = $('#specialty');
$hours=$('#hours');
$doctor=$('#doctor');
 $date =$('#date');

$specialty.change(()=>{
const specialtyId=$specialty.val();
const url=`/specialties/${specialtyId}/doctors`;
$.getJSON(url,onDoctorsLoaded);
});

$doctor.change(loadHours);
$date.change(loadHours);
});






function onDoctorsLoaded(doctors){
let htmlOptions='';
doctors.forEach( function (doctor){
//console.log(`${doctor.id} - ${doctor.name}`)
htmlOptions+= `<option value="${doctor.id}">${doctor.name}</option>`
  });
$doctor.html(htmlOptions);
loadHours();
}

function loadHours(){
 
    const selectedDate=$date.val();
    const doctorId=$doctor.val();

    const url =`/schedule/hours?date=${selectedDate}&doctor_id=${doctorId}`;
 
    $.getJSON(url,displayHours);
}


function displayHours(data){
if(!data.morning && !data.afternoon){
  $hours.html(noHoursAlert);
  return;
}

let htmlHours='';
iRadio=0;
if(data.morning){
  const morning_intervals=data.morning;
  morning_intervals.forEach(interval=>{
 
    htmlHours+= getRadioIntervalHtml(interval);
  });
}

if(data.afternoon){
  const afternoon_intervals=data.afternoon;
  afternoon_intervals.forEach(interval=>{
    htmlHours+=getRadioIntervalHtml(interval);
  });
}

$hours.html(htmlHours);
}


function getRadioIntervalHtml(interval){
const text=`${interval.start} - ${interval.end}`;
return `<div class="custom-control custom-radio mb-3">
<input class="custom-control-input" name="scheduled_time" value ="${interval.start}"  id="scheduled_time${iRadio}" type="radio"  required>
<label class="custom-control-label" for="scheduled_time${iRadio++}">${text} </label>
</div>`;

}