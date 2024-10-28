@extends('templates.app')

@section('title')
Data Koordinat Pekerjaan
@endsection

@section('content')
<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 400px;
    width: :100%;
	}
</style>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@include('pekerjaan/pekerjaaninfo')
		<div class="x_title">
			<h2>Data Koordinat Pekerjaan&nbsp;</h2> 
			<a href="{{asset('/')}}koordinatp/insert/{{$idpekerjaan}}" class="btn btn-success btn-xs" > <i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<table class="table table-striped jambo_table" style="table-layout: fixed;">
				<thead>
					<tr>
						<th width="30px">#</th>
						<!-- <th>idpekerjaan</th> -->
						<th width="30px">Grup</th>
						<th width="100px">Latitude</th>
						<th width="100px">Langitude</th>
						<th width="80px">Status</th>
						<!-- <th>modified_by</th> -->
						<!-- <th>created_at</th> -->
						<!-- <th>updated_at</th> -->
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 0)
					@php ($abjad = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','x','y','z'])
					@foreach ($rows as $row)
					<tr>
						<td class="text-center">{{ $abjad[$no++] }}.</td>
						<!-- <td>{{ $row['idpekerjaan'] }}</td> -->
						<td class="text-center">{{ $row['grup'] }}</td>
						<td class="text-center">{{ $row['latkoor'] }}</td>
						<td class="text-center">{{ $row['lngkoor'] }}</td>
						<td class="text-center">{{ $row['status'] }}</td>
						<!-- <td>{{ $row['modified_by'] }}</td> -->
						<!-- <td>{{ $row['created_at'] }}</td> -->
						<!-- <td>{{ $row['updated_at'] }}</td> -->
						<td class="text-center">
							<a href="{{asset('/')}}koordinatp/{{ $row->idkoordinatp }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{asset('/')}}koordinatp/{{ $row->idkoordinatp }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div id="map" class="col-md-6 col-sm-6 col-xs-12">
		</div>
	</div>
</div>
<script>
  var map;
  var arrayLine = [];
  var arrayLine2 = [];
  var allCoordinates = [
		@foreach ($rows as $koordinat)
      {lat: {{$koordinat['latkoor']}}, lng: {{$koordinat['lngkoor']}}},
    @endforeach
  ];

  @php ($number = 1)
  @php ($countRow = 1)
  @php ($total = count($rows))
	@php ($grupTemp = -100)
	var coordinate = null;
  var grupCoordinates = [];
  	@foreach ($rows as $koordinat)
  		@if($grupTemp != $koordinat['grup']){
      	@if($number != 1){
      		arrayLine2.push(grupCoordinates);
      		grupCoordinates = [];
      	}
      	@endif
      	@php ($number++)
      	grupCoordinates.push({lat: {{$koordinat['latkoor']}}, lng: {{$koordinat['lngkoor']}}});
    	}
    	@else{
    		grupCoordinates.push({lat: {{$koordinat['latkoor']}}, lng: {{$koordinat['lngkoor']}}});
    	}
    	@endif

    	@if($countRow == $total){
    		arrayLine2.push(grupCoordinates);
    	}
    	@endif
    	@php ($countRow++)
    	@php ($grupTemp = $koordinat['grup'])
    @endforeach
  arrayLine = arrayLine2;
</script>
<script type="text/javascript">
  function initMap() {
  	var marker;
  	var markers = [];
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnoprstuvwxyz';
    var labelIndex = 0;
    var cenLatLong = 0;
    var flightPath;

	  cenLatLong = Math.floor(allCoordinates.length/2);
	  map = new google.maps.Map(document.getElementById('map'), {
      center: allCoordinates[cenLatLong],
      mapTypeId: 'satellite',
      zoom: 16
    });

    for(i = 0; i < arrayLine.length ; i++){
		  flightPath = new google.maps.Polyline({
		    path: arrayLine[i],
		    geodesic: true,
		    strokeColor: '#FF0000',
		    strokeOpacity: 1.0,
		    strokeWeight: 2
		  });
		  addLine(flightPath);
		}
	  //Add listener
		google.maps.event.addListener(map, "click", function (event) {
		    var latitude = event.latLng.lat();
		    var longitude = event.latLng.lng();
		    console.log( latitude + ', ' + longitude );
		}); //end addListener

	  clearMarkers();
    for (var i = 0; i < allCoordinates.length; i++) {
      addMarkerWithTimeout(allCoordinates[i], i * 1000);
    }

    function addMarkerWithTimeout(position, timeout) {
      window.setTimeout(function() {
      	marker = new google.maps.Marker({
          position: position,
          map: map,
          label: labels[labelIndex++],
          animation: google.maps.Animation.DROP
        });
        markers.push(marker);
      	google.maps.event.addListener(marker, 'click', (function(marker, i) {
	        return function() {
      			console.log(this.getPosition().lat() +' '+this.getPosition().lng());
      			// infowindow.open(map, marker);
	        }
	      })(marker, i));
      }, timeout);
    }

    function clearMarkers() {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
      }
      markers = [];
    }
  }

  function addLine(flightPath) {
    flightPath.setMap(map);
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-gxjioIryRlDLbf-s2lpHbO1sRhqEZWk&callback=initMap" async defer></script>
@endsection

