$(document).ready(function() {
  $('#basic').on('input', function() {
    var basic = $(this).val();
    var rent = houseRent(basic);
    var medical = medicalrent(basic);
    var transport = transportallowance(basic);
    var special = specialAllowance(basic);
    var overtime = overtimerate(basic);
    $('#rent').val(rent);
    $('#medical').val(medical);
    $('#transport').val(transport);
    $('#special').val(special);
    $('#overtime_pay').val(overtime);
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
  $(document).ready(function() {
    $('#basic').on('input', function() {
        var basic = parseFloat($(this).val());
        var taxRate = 0.15; // You can adjust the tax rate as needed

        var tax = basic * taxRate;
        $('#tax').val(tax.toFixed(2));
        
        // Calculate and set other fields similarly
    });
});
//   function houseRent(basic) {
//     if (basic >= 50000) {
//       suggestedRent = basic * 0.050;
//     } else if (basic >= 25000 && basic <= 49999) {
//       suggestedRent = basic * 0.065;
//     } else if (basic >= 10000 && basic <= 24999) {
//       suggestedRent = basic * 0.070;
//     } else {  
//       suggestedRent = basic * 0;
//     }
//     return suggestedRent;
//   }
});