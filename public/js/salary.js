$(document).ready(function() {
  $('#basic').on('input', function() {
    var basic = $(this).val();
    var rent = houseRent(basic);
    var medical = medicalrent(basic);
    var transport = transportallowance(basic);
    var special = specialAllowance(basic);
    var overtime = overtimerate(basic);
    $('#rent').val(rent.toFixed(2));
    $('#medical').val(medical.toFixed(2));
    $('#transport').val(transport.toFixed(2));
    $('#special').val(special.toFixed(2));
    $('#overtime_pay').val(overtime.toFixed(2));
    var basic = parseFloat($(this).val());
    var taxRate = 0.15; // You can adjust the tax rate as needed
    var tax = basic * taxRate;
    $('#tax').val(tax.toFixed(2));
  });
  function houseRent(basic) {
    if (basic >= 50000) {
      suggestedRent = basic * 0.050;
    } else if (basic >= 25000 && basic <= 49999) {
      suggestedRent = basic * 0.065;
    } else if (basic >= 10000 && basic <= 24999) {
      suggestedRent = basic * 0.070;
    } else {  
      suggestedRent = basic * 0;
    }
    return suggestedRent;
  }
  function medicalrent(basic){
     if(basic >= 50000){
      suggestedAllowance = basic *0.23;
     }else if(basic >= 25000 && basic <=49999){
      suggestedAllowance = basic *.02;
     }else if(basic >= 10000 && basic <= 24999){
      suggestedAllowance = basic *0.07;
     }else{
      suggestedAllowance =basic*0;
     }
     return suggestedAllowance;
  }
  function transportallowance(basic){
    if(basic >= 60000){
      transport = basic *0.23;
     }else if(basic >= 25000 && basic <=49999){
      transport = basic *.02;
     }else if(basic >= 10000 && basic <= 24999){
      transport = basic *0.07;
     }else{
      transport =basic*0;
     }
     return transport;
  }
  function specialAllowance(basic){
    if(basic >= 60000){
      specialrent = basic *0.15;
     }else if(basic >= 25000 && basic <=49999){
      specialrent = basic *.10;
     }else if(basic >= 10000 && basic <= 24999){
      specialrent = basic *0.072;
     }else{
      specialrent =basic*0;
     }
     return specialrent;
  }
  function overtimerate(basic){
     var rate = (basic/1000)*5;
     return rate;
  }
});

$(document).ready(function () {
  console.log("Working");
  var basic = $("#basic").val(this.basic);
  var rent = $("#rent").val(this.rent);
  var gross = grossSalary(basic, rent);
  $("#grossSalary").val(this.gross);

  function grossSalary(basic, rent) {
    gross = basic + rent;
    return gross;
  }
});