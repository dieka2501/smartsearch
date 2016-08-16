<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<title>Smart Search Prototipe</title>
</head>
<body>
<div class="container">
	<h1 class="text-center">Smart Search Prototipe</h1>
	<div class="row text-center">
		<div class="col-md-12 ">
			<form class="form-inline" method="GET" action="{!!config('app.url')!!}/public">
			  <div class="form-group">
			    <input type="text" class="form-control" name='q' id="q" placeholder="Type keyword here" style="width: 900px;" value="{!!$cari!!}">
			  </div>
			  	<button type="submit" class="btn btn-primary">Search</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			@foreach($data as $datas)
			<div class="row">
				<h3><a href="{!!config('app.url')!!}/public/detail/{!!$datas->id_destination!!}" target="__blank">{!!$datas->destination_name!!}</a></h3>
				<hr>
				<p>{!!$datas->destination_description!!}</p>	
			</div>
			@endforeach
			<!-- <div class="row">
				<h3><a href="">Nama Destinasi</a></h3>
				<hr>
				<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>	
			</div>
			<div class="row">
				<h3><a href="">Nama Destinasi</a></h3>
				<hr>
				<p>Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>	
			</div> -->
		</div>
		<div class="col-md-3"></div>
	</div>	
</div>

<script type="text/javascript" href="https://code.jquery.com/jquery-3.1.0.min.js"></script>
</body>
</html>