
@extends('layouts.app')
@section('content')
<html>
<head>
  <style type="text/css">
     .profile_Image{
        max-width: 1000px;
        border: 5px solid #fff;
        border-radius:10%;
        box-shadow: 0 0px 0px ;
    }
     @media print {
    body { font-size: 10pt }
  }
  @media screen {
    body { font-size: 13px }
  }
  @media screen, print {
    body { line-height: 1.2 }
  }
 
</style>
  <script>
 function printpage(el) {
  var restorepage=document.body.innerHTML;
  var printcontent=document.getElementById(el).innerHTML;
 document.body.innerHTML=printcontent;
         window.print();
           document.body.innerHTML=restorepage;
       }
</script>
</head>
<body>

<div class="col-md-8 col-md-offset-0">
<div id="printableTable">
 <div class="panel-body text-center">
                    <img class="profile_Image" src="http://localhost:8000/download.jpg">
                     
                        <h2>Vehicle Service Report</h2>

                          </div> 
 <table class=class="table table-sm" id="" border="1" cellpadding="3">

  

    <thead class="thead-inverse">
      <tr>
        <th>Plate number</th>
        <th>Driver name</th>
        <th>Garage name</th>
        <th>Services made</th>
        <th>Cost</th>
     
        <th>From date</th>
        <th>Upto date</th>
       
        
        <th>service type</th>
        
        <th>covered by</th>
        <th>service in km</th>
   
       
      </tr>
    </thead>
   
  @foreach($Vehicleservice as $result)
  
  <tbody>
  <tr>
    <td><span>
      {{$result->platenumber}}

    </span></td>
    
    <td><span>
      {{$result->drivername}}

    </span></td>

    <td><span>
      {{$result->garagename}}

    </span></td>

    <td><span>


      
         @foreach(explode(',', $result->servicesmade) as $string)
        
            {{$counter++}}.                              {{ $string }}
          
 <br>
            <br>
         @endforeach

    </span></td>

    <td><span>
      {{$result->cost}} ETB

    </span></td>
  
      <td><span>
      {{$result->fromdate}}

    </span></td>
      <td><span>
      {{$result->uptodate}}

    </span></td>

    
      <td><span>
      {{$result->servicetype}}

    </span></td>
      <td><span>
      {{$result->coveredby}}

    </span></td>

      <td><span>
      {{$result->serviceinkm}} KM

    </span></td>

      

    
    </tr>
    </tbody>
      
  

@endforeach
 
 

  </table>



</div>
<div>
   
</div>

@endsection


</body>
</html>

