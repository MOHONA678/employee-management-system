$(document).ready(function() {
  $('#basic').on('input', function() {
    // var basic = $(this).val();
    var basic = $(this).val();
    var rent = houseRent(basic);
    var medical = medicalrent(basic);
    var transport = transportallowance(basic);
    var fund = providentFund(basic);
    var tax = incomeTax(basic);
    var health = healthInsurance(basic);
    var life = liftInsurance(basic);
    var overtime = overtimerate(basic);
    $('#rent').val(rent.toFixed(2));
    $('#medical').val(medical.toFixed(2));
    $('#transport').val(transport.toFixed(2));
    $('#providentFund').val(fund.toFixed(2));
    $('#incomeTax').val(tax.toFixed(2));
    $('#healthInsrance').val(health.toFixed(2));
    $('#lifeInsurance').val(life.toFixed(2));
    $('#overtime_pay').val(overtime.toFixed(2));
    // var basic = parseFloat($(this).val());
  });
  function houseRent(basic) {
    if (basic >= 50000) {
      suggestedRent = basic * 0.2;
    } else if (basic >= 25000 && basic <= 45000) {
      suggestedRent = basic * 0.15;
    } else if (basic >= 10000 && basic <= 20000) {
      suggestedRent = basic * 0.1;
    } else {  
      suggestedRent = basic * 0;
    }
    return suggestedRent;
  }
  function medicalrent(basic){
     if(basic >= 50000){
      suggestedAllowance = basic * 0.08;
     }else if(basic >= 25000 && basic <= 45000){
      suggestedAllowance = basic * 0.05;
     }else if(basic >= 10000 && basic <= 20000){
      suggestedAllowance = basic * 0.02;
     }else{
      suggestedAllowance = basic * 0;
     }
     return suggestedAllowance;
  }
  function transportallowance(basic){
    if(basic >= 50000){
      transport = basic * 0.07;
    }else if(basic >= 25000 && basic <= 45000){
      transport = basic * 0.05;
    }else if(basic >= 10000 && basic <= 20000){
      transport = basic * 0.03;
    }else{
      transport =basic * 0;
    }
    return transport;
  }
  function providentFund(basic){
    if(basic >= 50000){
      fund = basic * 0.015;
    }else if(basic >= 25000 && basic <= 45000){
      fund = basic * 0.01;
    }else if(basic >= 10000 && basic <= 20000){
      fund = basic * 0.005;
    }else{
      fund =basic * 0;
    }
    return fund;
  }
  function incomeTax(basic){
    if(basic >= 100000){
      suggestedTax = basic * 0.15;
     }else{
      suggestedTax =basic * 0;
     }
     return suggestedTax;
  }
  function healthInsurance(basic){
    if(basic >= 50000){
      health = basic * 0.04;
    }else if(basic >= 25000 && basic <= 45000){
      health = basic * 0.03;
    }else if(basic >= 10000 && basic <= 20000){
      health = basic * 0.025;
    }else{
      health =basic * 0;
    }
    return health;
  }
  function liftInsurance(basic){
    if(basic >= 50000){
      life = basic * 0.04;
    }else if(basic >= 25000 && basic <= 45000){
      life = basic * 0.03;
    }else if(basic >= 10000 && basic <= 20000){
      life = basic * 0.025;
    }else{
      life =basic * 0;
    }
    return life;
  }
  function overtimerate(basic){
     var rate = (basic/1000)*5;
     return rate;
  }
});

// $(document).ready(function () {
//   console.log("Working");
//   var basic = $("#basic").val(this.basic);
//   var rent = $("#rent").val(this.rent);
//   var gross = grossSalary(basic, rent);
//   $("#grossSalary").val(this.gross);

//   function grossSalary(basic, rent) {
//     gross = basic + rent;
//     return gross;
//   }
// });