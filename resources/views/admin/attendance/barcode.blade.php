@extends('layouts.admin')
{{-- @extends('admin') --}}

@section('title')
    {{ __('Dashboard') }}
    
@endsection

@section('header')
  <h1 class="h3 mb-3">Dashboard</h1>
@endsection

@section('content')
  {{-- <section class="row">
    <div class="col-12">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title mb-0">Empty card</h5>

          
        </div>
        <div class="card-body">
        </div>
      </div>
    </div>
  </section> --}}
    <div class="container">
    <div class="text-end"></div>
    <div class="btn d-grid btn-info my-3">
      <h2>Employee Attendance </h2>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="btn-group d-flex justify-content-between" role="group" aria-label="Basic radio toggle button group">
          <input value="in" type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
          <label class="btn btn-outline-primary rounded" for="btnradio1">In</label>

          <input value="out" type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
          <label class="btn btn-outline-primary rounded ms-1" for="btnradio2">Out</label>
          <div class="text-end"></div>
        </div>
        <div class=" btn btn-danger mt-2" id="btn">Start/Stop the scanner</div>
        <!-- Div to show the scanner -->
        <div class="rounded-3 mt-2" id="scanner-container"></div>
        <!-- <div class="rounded-3 mt-2" id="video"><video class="rounded border border-info" width="80%" height="80%" id="scanner-container"></video></div> -->
        <div class="fw-bold"> <input id="csrf" type="hidden" name="" value="">
        </div>

      </div>
      <div class="col-6">
        <div class="rounded">
          <h3 class="bg-info text-center rounded pb-2">Attendance Log</h3>
          <ul class="list-group" id="attlog"></ul>
        </div>
      </div>
    </div>
    <div id="result"></div>

  </div>

  
@endsection

@section('script')
<script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
<script src="/assets/js/instascan.min.js"></script>
<script>
    // npm install quagga

    var _scannerIsRunning = false;

    function startScanner() {
      Quagga.init({
          inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#scanner-container'),
            constraints: {
              width: 510,
              height: 300,
              facingMode: "environment"
            },
          },
          decoder: {
            readers: [
              "code_128_reader",
              "ean_reader",
              "ean_8_reader",
              "code_39_reader",
              "code_39_vin_reader",
              "codabar_reader",
              "upc_reader",
              "upc_e_reader",
              "i2of5_reader"
            ],
            
          },

        },
        function(err) {
          if (err) {
            console.log(err);
            return
          }

          console.log("Initialization finished. Ready to start");
          alert("Ready to Scann");
          Quagga.start();

          // Set flag to is running
          _scannerIsRunning = true;
        });
        ect
      Quagga.onDeted(function(content) {
        // console.log("Barcode detected and processed : [" + result.codeResult.code + "]", result);
        $("#result").html("");
        $empid = content.codeResult.code;
        console.log($empid);
        alert($empid);
        //send employee id to attendance table

      });

      
   
 // CSRF Hash
 var csrfName = $('#csrf').attr('name'); // CSRF Token name
      var csrfHash = $('#csrf').val(); // CSRF hash
      $.ajax({
        type: "post",
        // url: $url,
        data: {
          [csrfName]: csrfHash,
          type: $('input[name="btnradio"]:checked').val(),
          empid: $empid
        },
        success: function(response) {
          response = JSON.parse(response);
          if(response.error=="1"){
            $("#result").html("attendance not logged");
            return;
          }
          console.log(response);
          // alert(response.csrf_token);
          $('#csrf').val(response.csrf_token);
          if (response != "0") {
            $("#result").html("attendance logged");
            $("#attlog").append('<li class="list-group-item border border-info mb-1">Name: ' + response.name + ' (' + response.empid + '), ' + response.type + ', Time: ' + response.created_at + '</li>');
          } else {
            $("#result").html("attendance not logged");
          }
        }
      });
    }
    // End CSRF Hash
    
          // Start/stop scanner
          document.getElementById("btn").addEventListener("click", function() {
            if (_scannerIsRunning) {
              Quagga.stop();
            } else {
              startScanner();
            }
          }, false);
  </script>
@endsection