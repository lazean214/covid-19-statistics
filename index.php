<?php 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>COVID-19 Coronavirus Statistics</title>

    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="COVID-19 Coronavirus Statistics. Daily updated statistics from a leading university.">
    <meta itemprop="name" content="COVID-19 Coronavirus Statistics">
    <meta itemprop="description" content="COVID-19 Coronavirus Statistics. Daily updated statistics from a leading university.">
    <meta itemprop="image" content="https://neilsalazar.info/covid/images/neil-salazar-logo.png">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Pantheon Elysse">
    <meta property="og:description" content="COVID-19 Coronavirus Statistics. Daily updated statistics from a leading university.">
    <meta property="og:image" content="https://neilsalazar.info/covid/images/neil-salazar-logo.png">
    <meta property="og:url" content="https://neilsalazar.info/covid/">

    <meta name="twitter:title" content="COVID-19 Coronavirus Statistics">
    <meta name="twitter:description" content="COVID-19 Coronavirus Statistics. Daily updated statistics from a leading university.">
    <meta name="twitter:image" content="https://neilsalazar.info/covid/images/neil-salazar-logo.png">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <style>
        body {
            background: url(img/virus-4937609_1920.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Start your project here-->
    <div style="height: 100vh" class="hero">
        <div class="flex-center flex-column">
           <div class="container text-center">
            <h1 class="animated fadeIn mb-4 ">
                <img src="img/neil-salazar-logo.png" alt="" style="display:block; margin: 0 auto; width: 150px;">
                COVID-19 Coronavirus Statistics</h1>
            <h5 class="animated fadeIn mb-3">Daily updated statistics from a leading university.</h5>
            
                <p class="animated fadeIn">Disclaimer: All data, mapping, and analysis, copyright 2020 Johns Hopkins University, all rights reserved, is provided to the public strictly for educational and academic research purposes. The Website relies upon publicly available data from multiple sources, that do not always agree. NeilSalazar.info(this Website), Weedmark Systems (the author of this data API) and The Johns Hopkins University (the author of the data) hereby disclaims any and all representations and warranties with respect to this website, including accuracy, fitness for use, and merchantability. Reliance on this website for medical guidance or use of this website in commerce is strictly prohibited.</p>
            </div>
            <a href="#covidStatData" class="btn btn-primary smooth-scroll">Get Started <i class="fas fa-angle-down"></i></a>

        </div>
    </div>
    <?php 
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://covid19-api.weedmark.systems/api/v1/stats",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "x-rapidapi-host: covid-19-coronavirus-statistics.p.rapidapi.com",
    "x-rapidapi-key: FrpBepOu1zmshma8W6NGA78vcwj0p1ApODGjsng9iGSumnohu8"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$res =  json_decode($response, true);
$lastcheck = $res['data']['lastChecked'];
$data = $res['data']['covid19Stats'];
    ?>
    <section>
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h2>COVID-19 Coronavirus Statistics</h2>
                    <h3>Last Checked: <?php echo $lastcheck; ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 bg-white p-3">
                    <div class="table-responsive">
                        <table id="covidStatData" class="table table-striped table-bordered " cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">Country
                                    </th>
                                    <th class="th-sm">Province
                                    </th>
                                    <th class="th-sm">City
                                    </th>
                                    <th class="th-sm">Confirmed
                                    </th>
                                    <th class="th-sm">Deaths
                                    </th>
                                    <th class="th-sm">Recovery
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $stat): ?>
                                <tr>
                                    <td><?php echo $stat['country']; ?></td>
                                    <td><?php echo $stat['province']; ?></td>
                                    <td><?php echo $stat['city']; ?></td>
                                    <td><?php echo $stat['confirmed']; ?></td>
                                    <td><?php echo $stat['deaths']; ?></td>
                                    <td><?php echo $stat['recovered']; ?></td>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="th-sm">Country
                                    </th>
                                    <th class="th-sm">Province
                                    </th>
                                    <th class="th-sm">City
                                    </th>
                                    <th class="th-sm">Confirmed
                                    </th>
                                    <th class="th-sm">Deaths
                                    </th>
                                    <th class="th-sm">Recovery
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <footer class="py-5">
        <div class="container">
            <div class="float-left">Develop by: <a href="https://neilsalazar.info">Neil Salazar</a><br>
            Api provided by <a href="https://covid19-api.weedmark.systems/" class="text-muted">Weedmark Systems</a>
            </div>

        </div>
    </footer>
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#covidStatData').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>

</body>

</html>