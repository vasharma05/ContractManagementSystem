var buttons = document.getElementsByName('button');
var add_form =new Boolean(false);
var update_form =new Boolean(false);
var report =new Boolean(true);

function clicked_button(i) {
    if(i==0){
        document.getElementById("add_form").classList.toggle("disabled");
        // if(add_form){
        //     add_form = false;
        // }else{
        //     add_form = false;
        // }
    }else if(i==1){
        document.getElementById("update_form").classList.toggle("disabled");
    }else{
        document.getElementById("report").classList.toggle("disabled");
    }
}













































var add_start;
var add_end;
var add_period;
var diffTime;
var diffDays;
var add_startInput = document.getElementById('add_start_date');
add_startInput.addEventListener("change", (e)=>{
    add_start = new Date(e.target.value);
});
var add_endInput = document.getElementById('add_end_date');
add_endInput.addEventListener("change", (e)=>{
    add_end = new Date(e.target.value);
    if(add_start === undefined){
        alert("Enter the Start Date");
    }else{
    diffTime = Math.abs(add_end.getTime() - add_start.getTime());
    diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    if(diffDays >= 365){
        years = Math.floor(diffDays/365);
        days = diffDays%365;
        add_period = years + ' years ' + days + ' days ';
    }else{
        add_period = diffDays + ' days ';
    }
    document.getElementById('add_period').value = add_period;
    document.getElementById('add_period').placeholder = add_period;
    }

});

var update_start;
var update_end;
var update_period;
var update_startInput = document.getElementById('update_start_date');
update_startInput.addEventListener("change", (e)=>{
    update_start = new Date(e.target.value);
});
var update_endInput = document.getElementById('update_end_date');
update_endInput.addEventListener("change", (e)=>{
    update_end = new Date(e.target.value);
    if(update_start === undefined){
        alert("Enter the Start Date");
    }else{
    diffTime = Math.abs(update_end.getTime() - update_start.getTime());
    diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    if(diffDays >= 365){
        years = Math.floor(diffDays/365);
        days = diffDays%365;
        update_period = years + ' years ' + days + ' days';
    }else{
        update_period = diffDays + ' days ';
    }
    document.getElementById('update_period').value = update_period;
    document.getElementById('update_period').placeholder = update_period;
    }   

});

document.getElementById('id').value = Math.floor(Math.random()*90000) + 10000;
document.getElementById('id').placeholder = document.getElementById('id').value;
console.log(document.getElementById('id').value);

