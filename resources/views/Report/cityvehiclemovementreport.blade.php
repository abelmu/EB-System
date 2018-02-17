
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
                     
                        <h2>Vehicle Movement Report From {{$startdate}}  Up to {{$enddate}}</h2>

                          </div> 
 <table class=class="table table-sm" id="" border="1" cellpadding="3">

  

    <thead class="thead-inverse">
    <tr>
      <td>
        
      </td>

       <td>
        Fuel drawn For
      </td>

       <td>
        
      </td>


       <td>
        
      </td>

       <td>
        
      </td>

       <td>
        
      </td>
    </tr>
      <tr>
        <th>Platenumber</th>
  
 <th>  Field work</th>
        <th>City work</th>
       
     <th>Total Fuel drawn</th>
        
        <th> Amount in birr used for Field work</th>

        <th> Amount in birr used for city work</th>
       <th>Total birr</th>
        <th> Service in km for Field work</th>

         <th> Service in km for City work</th>
         <th>Total km</th>
         <th> Average km/litter For field</th>
         <th> Average km/litter For City</th>
         <th> Total Average km/litter </th>
        <th>Abysinia card remaining</th>
<th>
Remark
</th>
        
      </tr>
    </thead>
   
  @foreach($Vehiclemovement as $result)
  
  <tbody>
  <tr>
    <td><span>
      {{$result->platenumber}}

    </span></td>
    
    <td><span>

    @if ($result->totallitterforfield== '')
    {{ 0  }}Litt
    @else
      {{number_format($result->totallitterforfield,2)}} Litt
@endif
 

    </span></td>

   


    <td><span>

    @if ($result->totallitterforcity== '')
    {{ 0 }}Litt 
    @else
      {{$result->totallitterforcity}} Litt
@endif
 

    </span></td>
   <td><span>

    {{ $totallitter[$counter++] }} Litt




    </span></td>
 

  

        <td><span>

    @if ($result->totalbirrforfield== '')
    {{ 0 }}ETB
    @else
      {{$result->totalbirrforfield}} ETB
@endif
 

    </span></td>
   

     

       <td><span>

    @if ($result->totalbirrforcity== '')
    {{ 0 }}ETB
    @else
      {{$result->totalbirrforcity}} ETB
@endif
 

    </span></td>



       <td><span>
      {{ $totalbirrforfuel[$counterbirr++] }} ETB

    </span></td>


         <td><span>

    @if ($result->totalKmforfield== '')
    {{ 0 }}KM
    @else
      {{$result->totalKmforfield}} KM
@endif
 

    </span></td>

   

          <td><span>

    @if ($result->totalKmforcity== '')
    {{ 0 }}KM
    @else
      {{$result->totalKmforcity}} KM
@endif
 

    </span></td>
     <td><span>
      {{$servicekm[$counterkm++]}} KM

    </span></td>
    <span>
      <td>
        {{$averagekmfield[$counteravgkmfield++]}}KM
      </td>
    </span>
     <span>
      <td>
        {{$averagekmcity[$counteravgkmcity++]}}KM
      </td>
    </span>
       <td><span>
      {{ $averagekmperlitter[$counteraverage++] }} KM

    </span></td>
       <td><span>
      {{ $abysiniacardremaining[$counterabysiniacard++] }} 

    </span></td>
   
  <td></td>

    

    
    </tr>
    </tbody>
      
  @endforeach
<tr>
  <td>Total</td>
  <td>
    {{$totalfieldfuel}} Litt
  </td>
  <td>
    {{$totalcityfuel}}Litt
  </td>
  <td>
    {{$totalfuellitter}}Litt
  </td>
  <td>
    {{$totalfieldbirr}}ETB
  </td>
  <td>
    {{$totalcitybirr}}ETB
  </td>
  <td>
    {{$totalbirr}}ETB
  </td>
  <td>
    {{$fieldservicekm}}KM
  </td>

    <td>
    {{$cityservicekm}}KM
  </td>

    <td>
    {{$totalservicekm}}KM
  </td>

    <td>
    {{$totalavgkmfield}}KM
  </td>

    <td>
    {{$totalavgkmcity}}KM
  </td>

    <td>
    {{$totalavgkm}}KM
  </td>

    <td>
    {{$totalabysiniacardremain}}ETB
  </td>
 <td></td>

</tr>
 
 

  </table>
  </div>
<button onclick="printpage('printableTable')" class="btn btn-primary">
                                    print
                                </button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                          
                                  <a href="/vehiclemovreports" class="btn btn-primary">
                                  Back</a>


</div>
<div>
   
</div>

@endsection


</body>
</html>

