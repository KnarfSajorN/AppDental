   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pacientes
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Pacientes</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
     $msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>'; 
        }
        if ($msg=='3') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Actualizado!</h4>

            <p>   </p>
          </div>'; 


 
        }
 
      ?>

          <div class="box">
            <div class="box-header">
              <a href="nuevoPaciente">
              <button   class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fas fa-id-card-alt"></i>  Registrar Pacientes </strong></h4></button>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">


              <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
              <thead>
                <tr>
                    <th scope="col">Age (in months) (oms 0-2 / CDC 2-20 years)</th>
                    <th scope="col">3rd Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">5th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">10th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">25th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">50th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">75th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">85th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">90th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">95th Percentile Head Circumference (in centimeters)</th>
                    <th scope="col">97th Percentile Head Circumference (in centimeters)</th>
                </tr>
                </thead>
                <tbody>

<tr><th>0</th>	<td>11.3</td>	<td>11.5</td>	<td>11.9</td>	<td>12.6</td>	<td>13.4</td>	<td>14.3</td> <td>14.8</td>	<td>15.7</td> <td>15.8</td>	<td>16.1</td></tr>
<tr><th>1</th>	<td>12.6</td>	<td>12.8</td>	<td>13.2</td>	<td>14.1</td>	<td>14.9</td>	<td>15.9</td> <td>16.4</td>	<td>17.2</td> <td>17.3</td>	<td>17.6</td></tr>
<tr><th>2</th>	<td>13.8</td>	<td>14.1</td>	<td>14.5</td>	<td>15.4</td>	<td>16.3</td>	<td>17.3</td> <td>17.8</td>	<td>18.7</td> <td>18.8</td>	<td>19.2</td></tr>
<tr><th>3</th>	<td>14.4</td>	<td>14.7</td>	<td>15.1</td>	<td>16.0</td>	<td>16.9</td>	<td>17.9</td> <td>18.5</td>	<td>19.3</td> <td>19.4</td>	<td>19.8</td></tr>
<tr><th>4</th>	<td>14.7</td>	<td>15.0</td>	<td>15.4</td>	<td>16.2</td>	<td>17.2</td>	<td>18.2</td> <td>18.7</td>	<td>19.6</td> <td>19.7</td>	<td>20.1</td></tr>
<tr><th>5</th>	<td>14.8</td>	<td>15.1</td>	<td>15.5</td>	<td>16.4</td>	<td>17.3</td>	<td>18.3</td> <td>18.9</td>	<td>19.7</td> <td>19.8</td>	<td>20.2</td></tr>
<tr><th>6</th>	<td>14.9</td>	<td>15.2</td>	<td>15.6</td>	<td>16.4</td>	<td>17.3</td>	<td>18.3</td> <td>18.9</td>	<td>19.8</td> <td>19.9</td>	<td>20.3</td></tr>
<tr><th>7</th>	<td>14.9</td>	<td>15.2</td>	<td>15.6</td>	<td>16.4</td>	<td>17.3</td>	<td>18.3</td> <td>18.9</td>	<td>19.8</td> <td>19.9</td>	<td>20.3</td></tr>
<tr><th>8</th>	<td>14.9</td>	<td>15.1</td>	<td>15.5</td>	<td>16.3</td>	<td>17.3</td>	<td>18.2</td> <td>18.8</td>	<td>19.7</td> <td>19.8</td>	<td>20.2</td></tr>
<tr><th>9</th>	<td>14.8</td>	<td>15.1</td>	<td>15.5</td>	<td>16.3</td>	<td>17.2</td>	<td>18.1</td> <td>18.7</td>	<td>19.6</td> <td>19.7</td>	<td>20.1</td></tr>
<tr><th>10</th>	<td>14.7</td>	<td>15.0</td>	<td>15.4</td>	<td>16.2</td>	<td>17.0</td>	<td>18.0</td> <td>18.6</td>	<td>19.4</td> <td>19.5</td>	<td>19.9</td></tr>
<tr><th>11</th>	<td>14.6</td>	<td>14.9</td>	<td>15.3</td>	<td>16.0</td>	<td>16.9</td>	<td>17.9</td> <td>18.4</td>	<td>19.3</td> <td>19.4</td>	<td>19.8</td></tr>
<tr><th>12</th>	<td>14.5</td>	<td>14.8</td>	<td>15.2</td>	<td>15.9</td>	<td>16.8</td>	<td>17.7</td> <td>18.3</td>	<td>19.1</td> <td>19.2</td>	<td>19.6</td></tr>
<tr><th>13</th>	<td>14.4</td>	<td>14.7</td>	<td>15.1</td>	<td>15.8</td>	<td>16.7</td>	<td>17.6</td> <td>18.1</td>	<td>19.0</td> <td>19.1</td>	<td>19.5</td></tr>
<tr><th>14</th>	<td>14.3</td>	<td>14.6</td>	<td>15.0</td>	<td>15.7</td>	<td>16.6</td>	<td>17.5</td> <td>18.0</td>	<td>18.8</td> <td>18.9</td>	<td>19.3</td></tr>
<tr><th>15</th>	<td>14.2</td>	<td>14.5</td>	<td>14.9</td>	<td>15.6</td>	<td>16.4</td>	<td>17.4</td> <td>17.9</td>	<td>18.7</td> <td>18.8</td>	<td>19.2</td></tr>
<tr><th>16</th>	<td>14.2</td>	<td>14.4</td>	<td>14.8</td>	<td>15.5</td>	<td>16.3</td>	<td>17.2</td> <td>17.8</td>	<td>18.6</td> <td>18.7</td>	<td>19.1</td></tr>
<tr><th>17</th>	<td>14.1</td>	<td>14.3</td>	<td>14.7</td>	<td>15.4</td>	<td>16.2</td>	<td>17.1</td> <td>17.6</td>	<td>18.5</td> <td>18.6</td>	<td>18.9</td></tr>
<tr><th>18</th>	<td>14.0</td>	<td>14.2</td>	<td>14.6</td>	<td>15.3</td>	<td>16.1</td>	<td>17.0</td> <td>17.5</td>	<td>18.4</td> <td>18.5</td>	<td>18.8</td></tr>
<tr><th>19</th>	<td>13.9</td>	<td>14.2</td>	<td>14.6</td>	<td>15.2</td>	<td>16.1</td>	<td>16.9</td> <td>17.4</td>	<td>18.3</td> <td>18.4</td>	<td>18.7</td></tr>
<tr><th>20</th>	<td>13.9</td>	<td>14.1</td>	<td>14.5</td>	<td>15.2</td>	<td>16.0</td>	<td>16.9</td> <td>17.4</td>	<td>18.2</td> <td>18.3</td>	<td>18.6</td></tr>
<tr><th>21</th>	<td>13.8</td>	<td>14.1</td>	<td>14.5</td>	<td>15.1</td>	<td>15.9</td>	<td>16.8</td> <td>17.3</td>	<td>18.1</td> <td>18.2</td>	<td>18.6</td></tr>
<tr><th>22</th>	<td>13.8</td>	<td>14.0</td>	<td>14.4</td>	<td>15.0</td>	<td>15.8</td>	<td>16.7</td> <td>17.2</td>	<td>18.0</td> <td>18.1</td>	<td>18.5</td></tr>
<tr><th>23</th>	<td>13.7</td>	<td>14.0</td>	<td>14.4</td>	<td>15.0</td>	<td>15.8</td>	<td>16.7</td> <td>17.1</td>	<td>17.9</td> <td>18.0</td>	<td>18.4</td></tr>

<tr>
<th scope="row">24</th>
<td align="right">14.52095</td>
<td align="right">14.73732</td>
<td align="right">15.09033</td>
<td align="right">15.74164</td>
<td align="right">16.57503</td>
<td align="right">17.55719</td>
<td align="right">18.16219</td>
<td align="right">18.60948</td>
<td align="right">19.33801</td>
<td align="right">19.85986</td>
</tr>
<tr>
<th scope="row">24.5</th>
<td align="right">14.50348</td>
<td align="right">14.71929</td>
<td align="right">15.07117</td>
<td align="right">15.71963</td>
<td align="right">16.54777</td>
<td align="right">17.52129</td>
<td align="right">18.11955</td>
<td align="right">18.56111</td>
<td align="right">19.2789</td>
<td align="right">19.79194</td>
</tr>
<tr>
<th scope="row">25.5</th>
<td align="right">14.46882</td>
<td align="right">14.68361</td>
<td align="right">15.03336</td>
<td align="right">15.67634</td>
<td align="right">16.49443</td>
<td align="right">17.45135</td>
<td align="right">18.03668</td>
<td align="right">18.4673</td>
<td align="right">19.16466</td>
<td align="right">19.66102</td>
</tr>
<tr>
<th scope="row">26.5</th>
<td align="right">14.4346</td>
<td align="right">14.64843</td>
<td align="right">14.9962</td>
<td align="right">15.63403</td>
<td align="right">16.4426</td>
<td align="right">17.38384</td>
<td align="right">17.957</td>
<td align="right">18.37736</td>
<td align="right">19.05567</td>
<td align="right">19.53658</td>
</tr>
<tr>
<th scope="row">27.5</th>
<td align="right">14.40083</td>
<td align="right">14.61379</td>
<td align="right">14.95969</td>
<td align="right">15.59268</td>
<td align="right">16.39224</td>
<td align="right">17.31871</td>
<td align="right">17.88047</td>
<td align="right">18.29125</td>
<td align="right">18.95187</td>
<td align="right">19.41849</td>
</tr>
<tr>
<th scope="row">28.5</th>
<td align="right">14.36755</td>
<td align="right">14.57969</td>
<td align="right">14.92385</td>
<td align="right">15.55226</td>
<td align="right">16.34334</td>
<td align="right">17.25593</td>
<td align="right">17.80704</td>
<td align="right">18.20892</td>
<td align="right">18.85317</td>
<td align="right">19.30665</td>
</tr>
<tr>
<th scope="row">29.5</th>
<td align="right">14.33478</td>
<td align="right">14.54615</td>
<td align="right">14.88866</td>
<td align="right">15.51275</td>
<td align="right">16.29584</td>
<td align="right">17.19546</td>
<td align="right">17.73667</td>
<td align="right">18.13031</td>
<td align="right">18.75949</td>
<td align="right">19.20097</td>
</tr>
<tr>
<th scope="row">30.5</th>
<td align="right">14.30257</td>
<td align="right">14.51319</td>
<td align="right">14.85414</td>
<td align="right">15.47414</td>
<td align="right">16.24972</td>
<td align="right">17.13726</td>
<td align="right">17.66932</td>
<td align="right">18.05538</td>
<td align="right">18.67078</td>
<td align="right">19.10132</td>
</tr>
<tr>
<th scope="row">31.5</th>
<td align="right">14.27093</td>
<td align="right">14.48084</td>
<td align="right">14.82027</td>
<td align="right">15.43639</td>
<td align="right">16.20495</td>
<td align="right">17.0813</td>
<td align="right">17.60495</td>
<td align="right">17.98408</td>
<td align="right">18.58695</td>
<td align="right">19.00761</td>
</tr>
<tr>
<th scope="row">32.5</th>
<td align="right">14.23989</td>
<td align="right">14.44909</td>
<td align="right">14.78707</td>
<td align="right">15.39951</td>
<td align="right">16.1615</td>
<td align="right">17.02753</td>
<td align="right">17.54351</td>
<td align="right">17.91635</td>
<td align="right">18.50792</td>
<td align="right">18.91973</td>
</tr>
<tr>
<th scope="row">33.5</th>
<td align="right">14.20948</td>
<td align="right">14.41798</td>
<td align="right">14.75453</td>
<td align="right">15.36345</td>
<td align="right">16.11933</td>
<td align="right">16.97592</td>
<td align="right">17.48496</td>
<td align="right">17.85215</td>
<td align="right">18.43363</td>
<td align="right">18.83758</td>
</tr>
<tr>
<th scope="row">34.5</th>
<td align="right">14.17972</td>
<td align="right">14.3875</td>
<td align="right">14.72264</td>
<td align="right">15.32822</td>
<td align="right">16.07843</td>
<td align="right">16.92645</td>
<td align="right">17.42927</td>
<td align="right">17.79143</td>
<td align="right">18.364</td>
<td align="right">18.76106</td>
</tr>
<tr>
<th scope="row">35.5</th>
<td align="right">14.15063</td>
<td align="right">14.35767</td>
<td align="right">14.69142</td>
<td align="right">15.29379</td>
<td align="right">16.03876</td>
<td align="right">16.87907</td>
<td align="right">17.37639</td>
<td align="right">17.73414</td>
<td align="right">18.29895</td>
<td align="right">18.69006</td>
</tr>
<tr>
<th scope="row">36.5</th>
<td align="right">14.12223</td>
<td align="right">14.32851</td>
<td align="right">14.66086</td>
<td align="right">15.26016</td>
<td align="right">16.0003</td>
<td align="right">16.83376</td>
<td align="right">17.32627</td>
<td align="right">17.68022</td>
<td align="right">18.23842</td>
<td align="right">18.62449</td>
</tr>
<tr>
<th scope="row">37.5</th>
<td align="right">14.09453</td>
<td align="right">14.30002</td>
<td align="right">14.63096</td>
<td align="right">15.22731</td>
<td align="right">15.96304</td>
<td align="right">16.79048</td>
<td align="right">17.27889</td>
<td align="right">17.62963</td>
<td align="right">18.18231</td>
<td align="right">18.56425</td>
</tr>
<tr>
<th scope="row">38.5</th>
<td align="right">14.06756</td>
<td align="right">14.27222</td>
<td align="right">14.60173</td>
<td align="right">15.19523</td>
<td align="right">15.92695</td>
<td align="right">16.7492</td>
<td align="right">17.23419</td>
<td align="right">17.58231</td>
<td align="right">18.13057</td>
<td align="right">18.50924</td>
</tr>
<tr>
<th scope="row">39.5</th>
<td align="right">14.04132</td>
<td align="right">14.2451</td>
<td align="right">14.57316</td>
<td align="right">15.16392</td>
<td align="right">15.89203</td>
<td align="right">16.70988</td>
<td align="right">17.19213</td>
<td align="right">17.5382</td>
<td align="right">18.08311</td>
<td align="right">18.45938</td>
</tr>
<tr>
<th scope="row">40.5</th>
<td align="right">14.01582</td>
<td align="right">14.21868</td>
<td align="right">14.54527</td>
<td align="right">15.13337</td>
<td align="right">15.85824</td>
<td align="right">16.67251</td>
<td align="right">17.15266</td>
<td align="right">17.49725</td>
<td align="right">18.03986</td>
<td align="right">18.41456</td>
</tr>
<tr>
<th scope="row">41.5</th>
<td align="right">13.99107</td>
<td align="right">14.19297</td>
<td align="right">14.51805</td>
<td align="right">15.10359</td>
<td align="right">15.82559</td>
<td align="right">16.63704</td>
<td align="right">17.11575</td>
<td align="right">17.45941</td>
<td align="right">18.00074</td>
<td align="right">18.37469</td>
</tr>
<tr>
<th scope="row">42.5</th>
<td align="right">13.96707</td>
<td align="right">14.16796</td>
<td align="right">14.49151</td>
<td align="right">15.07458</td>
<td align="right">15.79406</td>
<td align="right">16.60345</td>
<td align="right">17.08135</td>
<td align="right">17.42462</td>
<td align="right">17.96568</td>
<td align="right">18.33969</td>
</tr>
<tr>
<th scope="row">43.5</th>
<td align="right">13.94383</td>
<td align="right">14.14367</td>
<td align="right">14.46566</td>
<td align="right">15.04633</td>
<td align="right">15.76364</td>
<td align="right">16.5717</td>
<td align="right">17.04941</td>
<td align="right">17.39282</td>
<td align="right">17.93459</td>
<td align="right">18.30947</td>
</tr>
<tr>
<th scope="row">44.5</th>
<td align="right">13.92133</td>
<td align="right">14.12009</td>
<td align="right">14.4405</td>
<td align="right">15.01886</td>
<td align="right">15.73434</td>
<td align="right">16.54177</td>
<td align="right">17.01988</td>
<td align="right">17.36395</td>
<td align="right">17.90741</td>
<td align="right">18.28393</td>
</tr>
<tr>
<th scope="row">45.5</th>
<td align="right">13.89959</td>
<td align="right">14.09723</td>
<td align="right">14.41604</td>
<td align="right">14.99218</td>
<td align="right">15.70614</td>
<td align="right">16.51364</td>
<td align="right">16.99272</td>
<td align="right">17.33795</td>
<td align="right">17.88405</td>
<td align="right">18.263</td>
</tr>
<tr>
<th scope="row">46.5</th>
<td align="right">13.87858</td>
<td align="right">14.07509</td>
<td align="right">14.39229</td>
<td align="right">14.96629</td>
<td align="right">15.67904</td>
<td align="right">16.48726</td>
<td align="right">16.96789</td>
<td align="right">17.31477</td>
<td align="right">17.86444</td>
<td align="right">18.24658</td>
</tr>
<tr>
<th scope="row">47.5</th>
<td align="right">13.85832</td>
<td align="right">14.05366</td>
<td align="right">14.36926</td>
<td align="right">14.9412</td>
<td align="right">15.65305</td>
<td align="right">16.46262</td>
<td align="right">16.94533</td>
<td align="right">17.29434</td>
<td align="right">17.8485</td>
<td align="right">18.23459</td>
</tr>
<tr>
<th scope="row">48.5</th>
<td align="right">13.83877</td>
<td align="right">14.03296</td>
<td align="right">14.34695</td>
<td align="right">14.91694</td>
<td align="right">15.62817</td>
<td align="right">16.4397</td>
<td align="right">16.92501</td>
<td align="right">17.27661</td>
<td align="right">17.83614</td>
<td align="right">18.22694</td>
</tr>
<tr>
<th scope="row">49.5</th>
<td align="right">13.81995</td>
<td align="right">14.01296</td>
<td align="right">14.32537</td>
<td align="right">14.89351</td>
<td align="right">15.60441</td>
<td align="right">16.41846</td>
<td align="right">16.90688</td>
<td align="right">17.26151</td>
<td align="right">17.8273</td>
<td align="right">18.22354</td>
</tr>
<tr>
<th scope="row">50.5</th>
<td align="right">13.80182</td>
<td align="right">13.99367</td>
<td align="right">14.30453</td>
<td align="right">14.87093</td>
<td align="right">15.58176</td>
<td align="right">16.39889</td>
<td align="right">16.89089</td>
<td align="right">17.24899</td>
<td align="right">17.82189</td>
<td align="right">18.22431</td>
</tr>
<tr>
<th scope="row">51.5</th>
<td align="right">13.78439</td>
<td align="right">13.97509</td>
<td align="right">14.28444</td>
<td align="right">14.84921</td>
<td align="right">15.56025</td>
<td align="right">16.38097</td>
<td align="right">16.87701</td>
<td align="right">17.23899</td>
<td align="right">17.81983</td>
<td align="right">18.22915</td>
</tr>
<tr>
<th scope="row">52.5</th>
<td align="right">13.76763</td>
<td align="right">13.95722</td>
<td align="right">14.2651</td>
<td align="right">14.82838</td>
<td align="right">15.53987</td>
<td align="right">16.36468</td>
<td align="right">16.86519</td>
<td align="right">17.23145</td>
<td align="right">17.82104</td>
<td align="right">18.23799</td>
</tr>
<tr>
<th scope="row">53.5</th>
<td align="right">13.75152</td>
<td align="right">13.94003</td>
<td align="right">14.24651</td>
<td align="right">14.80844</td>
<td align="right">15.52065</td>
<td align="right">16.35001</td>
<td align="right">16.8554</td>
<td align="right">17.22632</td>
<td align="right">17.82544</td>
<td align="right">18.25071</td>
</tr>
<tr>
<th scope="row">54.5</th>
<td align="right">13.73606</td>
<td align="right">13.92353</td>
<td align="right">14.22868</td>
<td align="right">14.78941</td>
<td align="right">15.50258</td>
<td align="right">16.33693</td>
<td align="right">16.8476</td>
<td align="right">17.22354</td>
<td align="right">17.83295</td>
<td align="right">18.26725</td>
</tr>
<tr>
<th scope="row">55.5</th>
<td align="right">13.72123</td>
<td align="right">13.90771</td>
<td align="right">14.21162</td>
<td align="right">14.7713</td>
<td align="right">15.48569</td>
<td align="right">16.32545</td>
<td align="right">16.84176</td>
<td align="right">17.22306</td>
<td align="right">17.84349</td>
<td align="right">18.2875</td>
</tr>
<tr>
<th scope="row">56.5</th>
<td align="right">13.70702</td>
<td align="right">13.89257</td>
<td align="right">14.19532</td>
<td align="right">14.75414</td>
<td align="right">15.46998</td>
<td align="right">16.31554</td>
<td align="right">16.83784</td>
<td align="right">17.22483</td>
<td align="right">17.85699</td>
<td align="right">18.31136</td>
</tr>
<tr>
<th scope="row">57.5</th>
<td align="right">13.6934</td>
<td align="right">13.87809</td>
<td align="right">14.17979</td>
<td align="right">14.73792</td>
<td align="right">15.45546</td>
<td align="right">16.3072</td>
<td align="right">16.8358</td>
<td align="right">17.2288</td>
<td align="right">17.87335</td>
<td align="right">18.33875</td>
</tr>
<tr>
<th scope="row">58.5</th>
<td align="right">13.68036</td>
<td align="right">13.86426</td>
<td align="right">14.16503</td>
<td align="right">14.72266</td>
<td align="right">15.44214</td>
<td align="right">16.30042</td>
<td align="right">16.83563</td>
<td align="right">17.23493</td>
<td align="right">17.89252</td>
<td align="right">18.36957</td>
</tr>
<tr>
<th scope="row">59.5</th>
<td align="right">13.6679</td>
<td align="right">13.85108</td>
<td align="right">14.15103</td>
<td align="right">14.70836</td>
<td align="right">15.43003</td>
<td align="right">16.29518</td>
<td align="right">16.83729</td>
<td align="right">17.24315</td>
<td align="right">17.9144</td>
<td align="right">18.40373</td>
</tr>
<tr>
<th scope="row">60.5</th>
<td align="right">13.656</td>
<td align="right">13.83855</td>
<td align="right">14.1378</td>
<td align="right">14.69504</td>
<td align="right">15.41914</td>
<td align="right">16.29148</td>
<td align="right">16.84076</td>
<td align="right">17.25344</td>
<td align="right">17.93893</td>
<td align="right">18.44112</td>
</tr>
<tr>
<th scope="row">61.5</th>
<td align="right">13.64464</td>
<td align="right">13.82665</td>
<td align="right">14.12534</td>
<td align="right">14.68269</td>
<td align="right">15.40947</td>
<td align="right">16.28932</td>
<td align="right">16.846</td>
<td align="right">17.26575</td>
<td align="right">17.96602</td>
<td align="right">18.48166</td>
</tr>
<tr>
<th scope="row">62.5</th>
<td align="right">13.63383</td>
<td align="right">13.81537</td>
<td align="right">14.11363</td>
<td align="right">14.67133</td>
<td align="right">15.40103</td>
<td align="right">16.28868</td>
<td align="right">16.853</td>
<td align="right">17.28003</td>
<td align="right">17.99562</td>
<td align="right">18.52525</td>
</tr>
<tr>
<th scope="row">63.5</th>
<td align="right">13.62355</td>
<td align="right">13.80472</td>
<td align="right">14.10268</td>
<td align="right">14.66094</td>
<td align="right">15.39382</td>
<td align="right">16.28955</td>
<td align="right">16.86173</td>
<td align="right">17.29625</td>
<td align="right">18.02764</td>
<td align="right">18.57179</td>
</tr>
<tr>
<th scope="row">64.5</th>
<td align="right">13.61379</td>
<td align="right">13.79469</td>
<td align="right">14.09249</td>
<td align="right">14.65154</td>
<td align="right">15.38783</td>
<td align="right">16.29192</td>
<td align="right">16.87217</td>
<td align="right">17.31437</td>
<td align="right">18.06201</td>
<td align="right">18.6212</td>
</tr>
<tr>
<th scope="row">65.5</th>
<td align="right">13.60456</td>
<td align="right">13.78527</td>
<td align="right">14.08305</td>
<td align="right">14.64312</td>
<td align="right">15.38307</td>
<td align="right">16.29578</td>
<td align="right">16.88428</td>
<td align="right">17.33435</td>
<td align="right">18.09868</td>
<td align="right">18.67337</td>
</tr>
<tr>
<th scope="row">66.5</th>
<td align="right">13.59584</td>
<td align="right">13.77646</td>
<td align="right">14.07436</td>
<td align="right">14.63567</td>
<td align="right">15.37953</td>
<td align="right">16.30113</td>
<td align="right">16.89805</td>
<td align="right">17.35616</td>
<td align="right">18.13758</td>
<td align="right">18.72823</td>
</tr>
<tr>
<th scope="row">67.5</th>
<td align="right">13.58764</td>
<td align="right">13.76825</td>
<td align="right">14.06642</td>
<td align="right">14.6292</td>
<td align="right">15.37721</td>
<td align="right">16.30794</td>
<td align="right">16.91346</td>
<td align="right">17.37975</td>
<td align="right">18.17863</td>
<td align="right">18.78569</td>
</tr>
<tr>
<th scope="row">68.5</th>
<td align="right">13.57996</td>
<td align="right">13.76065</td>
<td align="right">14.05921</td>
<td align="right">14.62369</td>
<td align="right">15.37609</td>
<td align="right">16.3162</td>
<td align="right">16.93048</td>
<td align="right">17.4051</td>
<td align="right">18.22179</td>
<td align="right">18.84564</td>
</tr>
<tr>
<th scope="row">69.5</th>
<td align="right">13.57278</td>
<td align="right">13.75364</td>
<td align="right">14.05274</td>
<td align="right">14.61914</td>
<td align="right">15.37618</td>
<td align="right">16.3259</td>
<td align="right">16.94909</td>
<td align="right">17.43217</td>
<td align="right">18.26698</td>
<td align="right">18.90802</td>
</tr>
<tr>
<th scope="row">70.5</th>
<td align="right">13.56612</td>
<td align="right">13.74724</td>
<td align="right">14.04701</td>
<td align="right">14.61555</td>
<td align="right">15.37745</td>
<td align="right">16.33702</td>
<td align="right">16.96925</td>
<td align="right">17.46092</td>
<td align="right">18.31416</td>
<td align="right">18.97273</td>
</tr>
<tr>
<th scope="row">71.5</th>
<td align="right">13.55998</td>
<td align="right">13.74144</td>
<td align="right">14.042</td>
<td align="right">14.6129</td>
<td align="right">15.37991</td>
<td align="right">16.34955</td>
<td align="right">16.99096</td>
<td align="right">17.49133</td>
<td align="right">18.36325</td>
<td align="right">19.03969</td>
</tr>
<tr>
<th scope="row">72.5</th>
<td align="right">13.55435</td>
<td align="right">13.73624</td>
<td align="right">14.03772</td>
<td align="right">14.6112</td>
<td align="right">15.38353</td>
<td align="right">16.36346</td>
<td align="right">17.01418</td>
<td align="right">17.52335</td>
<td align="right">18.41421</td>
<td align="right">19.10882</td>
</tr>
<tr>
<th scope="row">73.5</th>
<td align="right">13.54925</td>
<td align="right">13.73164</td>
<td align="right">14.03417</td>
<td align="right">14.61042</td>
<td align="right">15.38831</td>
<td align="right">16.37875</td>
<td align="right">17.03888</td>
<td align="right">17.55696</td>
<td align="right">18.46699</td>
<td align="right">19.18005</td>
</tr>
<tr>
<th scope="row">74.5</th>
<td align="right">13.54467</td>
<td align="right">13.72764</td>
<td align="right">14.03134</td>
<td align="right">14.61057</td>
<td align="right">15.39423</td>
<td align="right">16.39537</td>
<td align="right">17.06505</td>
<td align="right">17.59212</td>
<td align="right">18.52152</td>
<td align="right">19.25329</td>
</tr>
<tr>
<th scope="row">75.5</th>
<td align="right">13.54062</td>
<td align="right">13.72424</td>
<td align="right">14.02922</td>
<td align="right">14.61163</td>
<td align="right">15.40127</td>
<td align="right">16.41333</td>
<td align="right">17.09265</td>
<td align="right">17.6288</td>
<td align="right">18.57775</td>
<td align="right">19.32847</td>
</tr>
<tr>
<th scope="row">76.5</th>
<td align="right">13.5371</td>
<td align="right">13.72145</td>
<td align="right">14.02783</td>
<td align="right">14.61359</td>
<td align="right">15.40943</td>
<td align="right">16.4326</td>
<td align="right">17.12166</td>
<td align="right">17.66696</td>
<td align="right">18.63564</td>
<td align="right">19.40551</td>
</tr>
<tr>
<th scope="row">77.5</th>
<td align="right">13.53412</td>
<td align="right">13.71927</td>
<td align="right">14.02714</td>
<td align="right">14.61645</td>
<td align="right">15.41869</td>
<td align="right">16.45315</td>
<td align="right">17.15206</td>
<td align="right">17.70658</td>
<td align="right">18.69513</td>
<td align="right">19.48434</td>
</tr>
<tr>
<th scope="row">78.5</th>
<td align="right">13.53168</td>
<td align="right">13.71769</td>
<td align="right">14.02717</td>
<td align="right">14.6202</td>
<td align="right">15.42902</td>
<td align="right">16.47496</td>
<td align="right">17.1838</td>
<td align="right">17.74762</td>
<td align="right">18.75617</td>
<td align="right">19.5649</td>
</tr>
<tr>
<th scope="row">79.5</th>
<td align="right">13.5298</td>
<td align="right">13.71672</td>
<td align="right">14.02791</td>
<td align="right">14.62483</td>
<td align="right">15.44042</td>
<td align="right">16.49801</td>
<td align="right">17.21688</td>
<td align="right">17.79004</td>
<td align="right">18.81872</td>
<td align="right">19.6471</td>
</tr>
<tr>
<th scope="row">80.5</th>
<td align="right">13.52846</td>
<td align="right">13.71637</td>
<td align="right">14.02935</td>
<td align="right">14.63032</td>
<td align="right">15.45288</td>
<td align="right">16.52229</td>
<td align="right">17.25126</td>
<td align="right">17.83382</td>
<td align="right">18.88272</td>
<td align="right">19.73089</td>
</tr>
<tr>
<th scope="row">81.5</th>
<td align="right">13.52768</td>
<td align="right">13.71663</td>
<td align="right">14.0315</td>
<td align="right">14.63668</td>
<td align="right">15.46636</td>
<td align="right">16.54776</td>
<td align="right">17.28691</td>
<td align="right">17.87892</td>
<td align="right">18.94814</td>
<td align="right">19.81619</td>
</tr>
<tr>
<th scope="row">82.5</th>
<td align="right">13.52747</td>
<td align="right">13.71751</td>
<td align="right">14.03435</td>
<td align="right">14.64389</td>
<td align="right">15.48087</td>
<td align="right">16.5744</td>
<td align="right">17.3238</td>
<td align="right">17.92532</td>
<td align="right">19.01491</td>
<td align="right">19.90294</td>
</tr>
<tr>
<th scope="row">83.5</th>
<td align="right">13.52782</td>
<td align="right">13.71901</td>
<td align="right">14.03791</td>
<td align="right">14.65194</td>
<td align="right">15.49637</td>
<td align="right">16.60219</td>
<td align="right">17.36192</td>
<td align="right">17.97296</td>
<td align="right">19.083</td>
<td align="right">19.99107</td>
</tr>
<tr>
<th scope="row">84.5</th>
<td align="right">13.52874</td>
<td align="right">13.72113</td>
<td align="right">14.04216</td>
<td align="right">14.66082</td>
<td align="right">15.51287</td>
<td align="right">16.63112</td>
<td align="right">17.40122</td>
<td align="right">18.02183</td>
<td align="right">19.15236</td>
<td align="right">20.08052</td>
</tr>
<tr>
<th scope="row">85.5</th>
<td align="right">13.53025</td>
<td align="right">13.72387</td>
<td align="right">14.04711</td>
<td align="right">14.67054</td>
<td align="right">15.53034</td>
<td align="right">16.66114</td>
<td align="right">17.44168</td>
<td align="right">18.0719</td>
<td align="right">19.22295</td>
<td align="right">20.17123</td>
</tr>
<tr>
<th scope="row">86.5</th>
<td align="right">13.53233</td>
<td align="right">13.72724</td>
<td align="right">14.05276</td>
<td align="right">14.68107</td>
<td align="right">15.54876</td>
<td align="right">16.69225</td>
<td align="right">17.48329</td>
<td align="right">18.12312</td>
<td align="right">19.29471</td>
<td align="right">20.26314</td>
</tr>
<tr>
<th scope="row">87.5</th>
<td align="right">13.535</td>
<td align="right">13.73124</td>
<td align="right">14.0591</td>
<td align="right">14.69241</td>
<td align="right">15.56812</td>
<td align="right">16.72442</td>
<td align="right">17.52599</td>
<td align="right">18.17548</td>
<td align="right">19.36761</td>
<td align="right">20.35618</td>
</tr>
<tr>
<th scope="row">88.5</th>
<td align="right">13.53826</td>
<td align="right">13.73587</td>
<td align="right">14.06613</td>
<td align="right">14.70455</td>
<td align="right">15.58841</td>
<td align="right">16.75763</td>
<td align="right">17.56978</td>
<td align="right">18.22893</td>
<td align="right">19.44161</td>
<td align="right">20.45031</td>
</tr>
<tr>
<th scope="row">89.5</th>
<td align="right">13.54212</td>
<td align="right">13.74113</td>
<td align="right">14.07386</td>
<td align="right">14.71749</td>
<td align="right">15.60961</td>
<td align="right">16.79185</td>
<td align="right">17.61462</td>
<td align="right">18.28344</td>
<td align="right">19.51666</td>
<td align="right">20.54545</td>
</tr>
<tr>
<th scope="row">90.5</th>
<td align="right">13.54657</td>
<td align="right">13.74702</td>
<td align="right">14.08228</td>
<td align="right">14.73121</td>
<td align="right">15.63171</td>
<td align="right">16.82707</td>
<td align="right">17.66049</td>
<td align="right">18.33899</td>
<td align="right">19.59272</td>
<td align="right">20.64155</td>
</tr>
<tr>
<th scope="row">91.5</th>
<td align="right">13.55163</td>
<td align="right">13.75355</td>
<td align="right">14.09138</td>
<td align="right">14.74571</td>
<td align="right">15.65469</td>
<td align="right">16.86325</td>
<td align="right">17.70736</td>
<td align="right">18.39554</td>
<td align="right">19.66974</td>
<td align="right">20.73856</td>
</tr>
<tr>
<th scope="row">92.5</th>
<td align="right">13.55729</td>
<td align="right">13.76071</td>
<td align="right">14.10116</td>
<td align="right">14.76099</td>
<td align="right">15.67853</td>
<td align="right">16.90039</td>
<td align="right">17.7552</td>
<td align="right">18.45306</td>
<td align="right">19.74769</td>
<td align="right">20.83643</td>
</tr>
<tr>
<th scope="row">93.5</th>
<td align="right">13.56356</td>
<td align="right">13.76852</td>
<td align="right">14.11163</td>
<td align="right">14.77703</td>
<td align="right">15.70323</td>
<td align="right">16.93845</td>
<td align="right">17.80398</td>
<td align="right">18.51152</td>
<td align="right">19.82652</td>
<td align="right">20.93509</td>
</tr>
<tr>
<th scope="row">94.5</th>
<td align="right">13.57044</td>
<td align="right">13.77695</td>
<td align="right">14.12279</td>
<td align="right">14.79382</td>
<td align="right">15.72877</td>
<td align="right">16.97742</td>
<td align="right">17.85369</td>
<td align="right">18.57089</td>
<td align="right">19.9062</td>
<td align="right">21.03449</td>
</tr>
<tr>
<th scope="row">95.5</th>
<td align="right">13.57793</td>
<td align="right">13.78603</td>
<td align="right">14.13462</td>
<td align="right">14.81136</td>
<td align="right">15.75513</td>
<td align="right">17.01727</td>
<td align="right">17.90429</td>
<td align="right">18.63115</td>
<td align="right">19.98668</td>
<td align="right">21.13459</td>
</tr>
<tr>
<th scope="row">96.5</th>
<td align="right">13.58604</td>
<td align="right">13.79575</td>
<td align="right">14.14712</td>
<td align="right">14.82965</td>
<td align="right">15.78231</td>
<td align="right">17.05799</td>
<td align="right">17.95575</td>
<td align="right">18.69225</td>
<td align="right">20.06793</td>
<td align="right">21.23532</td>
</tr>
<tr>
<th scope="row">97.5</th>
<td align="right">13.59477</td>
<td align="right">13.8061</td>
<td align="right">14.1603</td>
<td align="right">14.84867</td>
<td align="right">15.81029</td>
<td align="right">17.09955</td>
<td align="right">18.00807</td>
<td align="right">18.75418</td>
<td align="right">20.1499</td>
<td align="right">21.33665</td>
</tr>
<tr>
<th scope="row">98.5</th>
<td align="right">13.60411</td>
<td align="right">13.8171</td>
<td align="right">14.17416</td>
<td align="right">14.86841</td>
<td align="right">15.83905</td>
<td align="right">17.14193</td>
<td align="right">18.0612</td>
<td align="right">18.8169</td>
<td align="right">20.23256</td>
<td align="right">21.43852</td>
</tr>
<tr>
<th scope="row">99.5</th>
<td align="right">13.61408</td>
<td align="right">13.82873</td>
<td align="right">14.18868</td>
<td align="right">14.88888</td>
<td align="right">15.86858</td>
<td align="right">17.18512</td>
<td align="right">18.11512</td>
<td align="right">18.88038</td>
<td align="right">20.31587</td>
<td align="right">21.54088</td>
</tr>
<tr>
<th scope="row">100.5</th>
<td align="right">13.62467</td>
<td align="right">13.84101</td>
<td align="right">14.20387</td>
<td align="right">14.91006</td>
<td align="right">15.89888</td>
<td align="right">17.22909</td>
<td align="right">18.16981</td>
<td align="right">18.94459</td>
<td align="right">20.39979</td>
<td align="right">21.64368</td>
</tr>
<tr>
<th scope="row">101.5</th>
<td align="right">13.63588</td>
<td align="right">13.85392</td>
<td align="right">14.21972</td>
<td align="right">14.93194</td>
<td align="right">15.92992</td>
<td align="right">17.27383</td>
<td align="right">18.22525</td>
<td align="right">19.00952</td>
<td align="right">20.48429</td>
<td align="right">21.74689</td>
</tr>
<tr>
<th scope="row">102.5</th>
<td align="right">13.64771</td>
<td align="right">13.86747</td>
<td align="right">14.23624</td>
<td align="right">14.95453</td>
<td align="right">15.96169</td>
<td align="right">17.31932</td>
<td align="right">18.28141</td>
<td align="right">19.07512</td>
<td align="right">20.56933</td>
<td align="right">21.85044</td>
</tr>
<tr>
<th scope="row">103.5</th>
<td align="right">13.66017</td>
<td align="right">13.88166</td>
<td align="right">14.25341</td>
<td align="right">14.9778</td>
<td align="right">15.99419</td>
<td align="right">17.36552</td>
<td align="right">18.33827</td>
<td align="right">19.14137</td>
<td align="right">20.65487</td>
<td align="right">21.9543</td>
</tr>
<tr>
<th scope="row">104.5</th>
<td align="right">13.67325</td>
<td align="right">13.89648</td>
<td align="right">14.27124</td>
<td align="right">15.00176</td>
<td align="right">16.02741</td>
<td align="right">17.41244</td>
<td align="right">18.3958</td>
<td align="right">19.20825</td>
<td align="right">20.74089</td>
<td align="right">22.05842</td>
</tr>
<tr>
<th scope="row">105.5</th>
<td align="right">13.68696</td>
<td align="right">13.91194</td>
<td align="right">14.28972</td>
<td align="right">15.0264</td>
<td align="right">16.06132</td>
<td align="right">17.46005</td>
<td align="right">18.45398</td>
<td align="right">19.27573</td>
<td align="right">20.82733</td>
<td align="right">22.16276</td>
</tr>
<tr>
<th scope="row">106.5</th>
<td align="right">13.70129</td>
<td align="right">13.92804</td>
<td align="right">14.30884</td>
<td align="right">15.05172</td>
<td align="right">16.09591</td>
<td align="right">17.50833</td>
<td align="right">18.5128</td>
<td align="right">19.34378</td>
<td align="right">20.91417</td>
<td align="right">22.26727</td>
</tr>
<tr>
<th scope="row">107.5</th>
<td align="right">13.71624</td>
<td align="right">13.94476</td>
<td align="right">14.32862</td>
<td align="right">15.07769</td>
<td align="right">16.13119</td>
<td align="right">17.55726</td>
<td align="right">18.57222</td>
<td align="right">19.41238</td>
<td align="right">21.00138</td>
<td align="right">22.37192</td>
</tr>
<tr>
<th scope="row">108.5</th>
<td align="right">13.73182</td>
<td align="right">13.96212</td>
<td align="right">14.34903</td>
<td align="right">15.10433</td>
<td align="right">16.16712</td>
<td align="right">17.60683</td>
<td align="right">18.63222</td>
<td align="right">19.48149</td>
<td align="right">21.08893</td>
<td align="right">22.47666</td>
</tr>
<tr>
<th scope="row">109.5</th>
<td align="right">13.74801</td>
<td align="right">13.9801</td>
<td align="right">14.37008</td>
<td align="right">15.13161</td>
<td align="right">16.20371</td>
<td align="right">17.65702</td>
<td align="right">18.69279</td>
<td align="right">19.5511</td>
<td align="right">21.17677</td>
<td align="right">22.58145</td>
</tr>
<tr>
<th scope="row">110.5</th>
<td align="right">13.76483</td>
<td align="right">13.99871</td>
<td align="right">14.39177</td>
<td align="right">15.15954</td>
<td align="right">16.24094</td>
<td align="right">17.7078</td>
<td align="right">18.7539</td>
<td align="right">19.62118</td>
<td align="right">21.26488</td>
<td align="right">22.68625</td>
</tr>
<tr>
<th scope="row">111.5</th>
<td align="right">13.78227</td>
<td align="right">14.01795</td>
<td align="right">14.41409</td>
<td align="right">15.1881</td>
<td align="right">16.2788</td>
<td align="right">17.75918</td>
<td align="right">18.81554</td>
<td align="right">19.69171</td>
<td align="right">21.35323</td>
<td align="right">22.79103</td>
</tr>
<tr>
<th scope="row">112.5</th>
<td align="right">13.80033</td>
<td align="right">14.0378</td>
<td align="right">14.43703</td>
<td align="right">15.2173</td>
<td align="right">16.31728</td>
<td align="right">17.81112</td>
<td align="right">18.87767</td>
<td align="right">19.76266</td>
<td align="right">21.44178</td>
<td align="right">22.89575</td>
</tr>
<tr>
<th scope="row">113.5</th>
<td align="right">13.819</td>
<td align="right">14.05828</td>
<td align="right">14.46059</td>
<td align="right">15.24712</td>
<td align="right">16.35637</td>
<td align="right">17.86361</td>
<td align="right">18.94028</td>
<td align="right">19.83401</td>
<td align="right">21.53051</td>
<td align="right">23.00036</td>
</tr>
<tr>
<th scope="row">114.5</th>
<td align="right">13.83828</td>
<td align="right">14.07937</td>
<td align="right">14.48478</td>
<td align="right">15.27755</td>
<td align="right">16.39606</td>
<td align="right">17.91664</td>
<td align="right">19.00336</td>
<td align="right">19.90573</td>
<td align="right">21.61938</td>
<td align="right">23.10484</td>
</tr>
<tr>
<th scope="row">115.5</th>
<td align="right">13.85818</td>
<td align="right">14.10107</td>
<td align="right">14.50957</td>
<td align="right">15.30859</td>
<td align="right">16.43633</td>
<td align="right">17.9702</td>
<td align="right">19.06688</td>
<td align="right">19.97781</td>
<td align="right">21.70837</td>
<td align="right">23.20915</td>
</tr>
<tr>
<th scope="row">116.5</th>
<td align="right">13.87868</td>
<td align="right">14.12338</td>
<td align="right">14.53498</td>
<td align="right">15.34024</td>
<td align="right">16.47718</td>
<td align="right">18.02425</td>
<td align="right">19.13081</td>
<td align="right">20.05021</td>
<td align="right">21.79745</td>
<td align="right">23.31326</td>
</tr>
<tr>
<th scope="row">117.5</th>
<td align="right">13.89979</td>
<td align="right">14.1463</td>
<td align="right">14.56099</td>
<td align="right">15.37248</td>
<td align="right">16.5186</td>
<td align="right">18.07879</td>
<td align="right">19.19516</td>
<td align="right">20.12292</td>
<td align="right">21.88659</td>
<td align="right">23.41712</td>
</tr>
<tr>
<th scope="row">118.5</th>
<td align="right">13.92151</td>
<td align="right">14.16982</td>
<td align="right">14.5876</td>
<td align="right">15.40531</td>
<td align="right">16.56057</td>
<td align="right">18.13381</td>
<td align="right">19.25988</td>
<td align="right">20.19592</td>
<td align="right">21.97576</td>
<td align="right">23.52071</td>
</tr>
<tr>
<th scope="row">119.5</th>
<td align="right">13.94382</td>
<td align="right">14.19394</td>
<td align="right">14.61481</td>
<td align="right">15.43872</td>
<td align="right">16.60309</td>
<td align="right">18.18929</td>
<td align="right">19.32497</td>
<td align="right">20.26919</td>
<td align="right">22.06494</td>
<td align="right">23.624</td>
</tr>
<tr>
<th scope="row">120.5</th>
<td align="right">13.96673</td>
<td align="right">14.21866</td>
<td align="right">14.6426</td>
<td align="right">15.4727</td>
<td align="right">16.64614</td>
<td align="right">18.24521</td>
<td align="right">19.39041</td>
<td align="right">20.3427</td>
<td align="right">22.15409</td>
<td align="right">23.72696</td>
</tr>
<tr>
<th scope="row">121.5</th>
<td align="right">13.99024</td>
<td align="right">14.24396</td>
<td align="right">14.67098</td>
<td align="right">15.50725</td>
<td align="right">16.68972</td>
<td align="right">18.30156</td>
<td align="right">19.45618</td>
<td align="right">20.41643</td>
<td align="right">22.2432</td>
<td align="right">23.82955</td>
</tr>
<tr>
<th scope="row">122.5</th>
<td align="right">14.01433</td>
<td align="right">14.26985</td>
<td align="right">14.69994</td>
<td align="right">15.54236</td>
<td align="right">16.73381</td>
<td align="right">18.35833</td>
<td align="right">19.52226</td>
<td align="right">20.49036</td>
<td align="right">22.33224</td>
<td align="right">23.93175</td>
</tr>
<tr>
<th scope="row">123.5</th>
<td align="right">14.03901</td>
<td align="right">14.29633</td>
<td align="right">14.72948</td>
<td align="right">15.57803</td>
<td align="right">16.7784</td>
<td align="right">18.4155</td>
<td align="right">19.58864</td>
<td align="right">20.56448</td>
<td align="right">22.42118</td>
<td align="right">24.03353</td>
</tr>
<tr>
<th scope="row">124.5</th>
<td align="right">14.06427</td>
<td align="right">14.32338</td>
<td align="right">14.75958</td>
<td align="right">15.61424</td>
<td align="right">16.8235</td>
<td align="right">18.47306</td>
<td align="right">19.6553</td>
<td align="right">20.63877</td>
<td align="right">22.51</td>
<td align="right">24.13486</td>
</tr>
<tr>
<th scope="row">125.5</th>
<td align="right">14.09011</td>
<td align="right">14.35101</td>
<td align="right">14.79025</td>
<td align="right">15.65099</td>
<td align="right">16.86907</td>
<td align="right">18.53099</td>
<td align="right">19.72222</td>
<td align="right">20.7132</td>
<td align="right">22.59868</td>
<td align="right">24.23571</td>
</tr>
<tr>
<th scope="row">126.5</th>
<td align="right">14.11653</td>
<td align="right">14.3792</td>
<td align="right">14.82148</td>
<td align="right">15.68826</td>
<td align="right">16.91512</td>
<td align="right">18.58928</td>
<td align="right">19.78938</td>
<td align="right">20.78775</td>
<td align="right">22.68719</td>
<td align="right">24.33606</td>
</tr>
<tr>
<th scope="row">127.5</th>
<td align="right">14.14351</td>
<td align="right">14.40796</td>
<td align="right">14.85326</td>
<td align="right">15.72607</td>
<td align="right">16.96164</td>
<td align="right">18.64792</td>
<td align="right">19.85678</td>
<td align="right">20.86242</td>
<td align="right">22.77551</td>
<td align="right">24.43589</td>
</tr>
<tr>
<th scope="row">128.5</th>
<td align="right">14.17106</td>
<td align="right">14.43727</td>
<td align="right">14.88558</td>
<td align="right">15.76439</td>
<td align="right">17.00862</td>
<td align="right">18.70689</td>
<td align="right">19.92439</td>
<td align="right">20.93718</td>
<td align="right">22.86363</td>
<td align="right">24.53516</td>
</tr>
<tr>
<th scope="row">129.5</th>
<td align="right">14.19916</td>
<td align="right">14.46714</td>
<td align="right">14.91845</td>
<td align="right">15.80322</td>
<td align="right">17.05604</td>
<td align="right">18.76619</td>
<td align="right">19.9922</td>
<td align="right">21.01201</td>
<td align="right">22.95151</td>
<td align="right">24.63386</td>
</tr>
<tr>
<th scope="row">130.5</th>
<td align="right">14.22782</td>
<td align="right">14.49756</td>
<td align="right">14.95184</td>
<td align="right">15.84255</td>
<td align="right">17.1039</td>
<td align="right">18.82579</td>
<td align="right">20.06019</td>
<td align="right">21.0869</td>
<td align="right">23.03915</td>
<td align="right">24.73197</td>
</tr>
<tr>
<th scope="row">131.5</th>
<td align="right">14.25703</td>
<td align="right">14.52852</td>
<td align="right">14.98577</td>
<td align="right">15.88237</td>
<td align="right">17.15218</td>
<td align="right">18.8857</td>
<td align="right">20.12835</td>
<td align="right">21.16183</td>
<td align="right">23.12651</td>
<td align="right">24.82945</td>
</tr>
<tr>
<th scope="row">132.5</th>
<td align="right">14.28678</td>
<td align="right">14.56001</td>
<td align="right">15.02022</td>
<td align="right">15.92268</td>
<td align="right">17.20089</td>
<td align="right">18.94588</td>
<td align="right">20.19667</td>
<td align="right">21.23679</td>
<td align="right">23.21358</td>
<td align="right">24.9263</td>
</tr>
<tr>
<th scope="row">133.5</th>
<td align="right">14.31707</td>
<td align="right">14.59203</td>
<td align="right">15.05519</td>
<td align="right">15.96347</td>
<td align="right">17.25</td>
<td align="right">19.00634</td>
<td align="right">20.26514</td>
<td align="right">21.31175</td>
<td align="right">23.30035</td>
<td align="right">25.02249</td>
</tr>
<tr>
<th scope="row">134.5</th>
<td align="right">14.34789</td>
<td align="right">14.62458</td>
<td align="right">15.09066</td>
<td align="right">16.00473</td>
<td align="right">17.29951</td>
<td align="right">19.06706</td>
<td align="right">20.33373</td>
<td align="right">21.38671</td>
<td align="right">23.38679</td>
<td align="right">25.11801</td>
</tr>
<tr>
<th scope="row">135.5</th>
<td align="right">14.37924</td>
<td align="right">14.65765</td>
<td align="right">15.12664</td>
<td align="right">16.04646</td>
<td align="right">17.34942</td>
<td align="right">19.12803</td>
<td align="right">20.40243</td>
<td align="right">21.46165</td>
<td align="right">23.47289</td>
<td align="right">25.21283</td>
</tr>
<tr>
<th scope="row">136.5</th>
<td align="right">14.41111</td>
<td align="right">14.69122</td>
<td align="right">15.16311</td>
<td align="right">16.08864</td>
<td align="right">17.3997</td>
<td align="right">19.18924</td>
<td align="right">20.47124</td>
<td align="right">21.53655</td>
<td align="right">23.55863</td>
<td align="right">25.30693</td>
</tr>
<tr>
<th scope="row">137.5</th>
<td align="right">14.44349</td>
<td align="right">14.72531</td>
<td align="right">15.20007</td>
<td align="right">16.13127</td>
<td align="right">17.45036</td>
<td align="right">19.25067</td>
<td align="right">20.54013</td>
<td align="right">21.61141</td>
<td align="right">23.644</td>
<td align="right">25.40031</td>
</tr>
<tr>
<th scope="row">138.5</th>
<td align="right">14.47638</td>
<td align="right">14.75989</td>
<td align="right">15.23751</td>
<td align="right">16.17434</td>
<td align="right">17.50138</td>
<td align="right">19.31232</td>
<td align="right">20.6091</td>
<td align="right">21.6862</td>
<td align="right">23.72897</td>
<td align="right">25.49294</td>
</tr>
<tr>
<th scope="row">139.5</th>
<td align="right">14.50977</td>
<td align="right">14.79496</td>
<td align="right">15.27543</td>
<td align="right">16.21784</td>
<td align="right">17.55276</td>
<td align="right">19.37417</td>
<td align="right">20.67814</td>
<td align="right">21.76091</td>
<td align="right">23.81354</td>
<td align="right">25.58481</td>
</tr>
<tr>
<th scope="row">140.5</th>
<td align="right">14.54365</td>
<td align="right">14.83052</td>
<td align="right">15.31381</td>
<td align="right">16.26177</td>
<td align="right">17.60448</td>
<td align="right">19.43622</td>
<td align="right">20.74722</td>
<td align="right">21.83554</td>
<td align="right">23.89769</td>
<td align="right">25.67591</td>
</tr>
<tr>
<th scope="row">141.5</th>
<td align="right">14.57802</td>
<td align="right">14.86655</td>
<td align="right">15.35265</td>
<td align="right">16.30612</td>
<td align="right">17.65653</td>
<td align="right">19.49845</td>
<td align="right">20.81635</td>
<td align="right">21.91006</td>
<td align="right">23.98141</td>
<td align="right">25.76623</td>
</tr>
<tr>
<th scope="row">142.5</th>
<td align="right">14.61287</td>
<td align="right">14.90306</td>
<td align="right">15.39195</td>
<td align="right">16.35087</td>
<td align="right">17.70892</td>
<td align="right">19.56086</td>
<td align="right">20.88551</td>
<td align="right">21.98447</td>
<td align="right">24.06469</td>
<td align="right">25.85575</td>
</tr>
<tr>
<th scope="row">143.5</th>
<td align="right">14.64819</td>
<td align="right">14.94002</td>
<td align="right">15.43169</td>
<td align="right">16.39603</td>
<td align="right">17.76162</td>
<td align="right">19.62342</td>
<td align="right">20.95468</td>
<td align="right">22.05876</td>
<td align="right">24.1475</td>
<td align="right">25.94446</td>
</tr>
<tr>
<th scope="row">144.5</th>
<td align="right">14.68398</td>
<td align="right">14.97745</td>
<td align="right">15.47187</td>
<td align="right">16.44158</td>
<td align="right">17.81463</td>
<td align="right">19.68614</td>
<td align="right">21.02386</td>
<td align="right">22.1329</td>
<td align="right">24.22985</td>
<td align="right">26.03234</td>
</tr>
<tr>
<th scope="row">145.5</th>
<td align="right">14.72022</td>
<td align="right">15.01532</td>
<td align="right">15.51248</td>
<td align="right">16.48751</td>
<td align="right">17.86795</td>
<td align="right">19.74901</td>
<td align="right">21.09304</td>
<td align="right">22.2069</td>
<td align="right">24.31172</td>
<td align="right">26.11941</td>
</tr>
<tr>
<th scope="row">146.5</th>
<td align="right">14.75692</td>
<td align="right">15.05363</td>
<td align="right">15.5535</td>
<td align="right">16.53382</td>
<td align="right">17.92155</td>
<td align="right">19.812</td>
<td align="right">21.1622</td>
<td align="right">22.28075</td>
<td align="right">24.3931</td>
<td align="right">26.20563</td>
</tr>
<tr>
<th scope="row">147.5</th>
<td align="right">14.79406</td>
<td align="right">15.09238</td>
<td align="right">15.59495</td>
<td align="right">16.5805</td>
<td align="right">17.97544</td>
<td align="right">19.87512</td>
<td align="right">21.23134</td>
<td align="right">22.35442</td>
<td align="right">24.47397</td>
<td align="right">26.29101</td>
</tr>
<tr>
<th scope="row">148.5</th>
<td align="right">14.83163</td>
<td align="right">15.13155</td>
<td align="right">15.6368</td>
<td align="right">16.62754</td>
<td align="right">18.02961</td>
<td align="right">19.93836</td>
<td align="right">21.30045</td>
<td align="right">22.42791</td>
<td align="right">24.55434</td>
<td align="right">26.37553</td>
</tr>
<tr>
<th scope="row">149.5</th>
<td align="right">14.86963</td>
<td align="right">15.17113</td>
<td align="right">15.67904</td>
<td align="right">16.67494</td>
<td align="right">18.08404</td>
<td align="right">20.0017</td>
<td align="right">21.36951</td>
<td align="right">22.50122</td>
<td align="right">24.6342</td>
<td align="right">26.4592</td>
</tr>
<tr>
<th scope="row">150.5</th>
<td align="right">14.90804</td>
<td align="right">15.21113</td>
<td align="right">15.72168</td>
<td align="right">16.72267</td>
<td align="right">18.13873</td>
<td align="right">20.06514</td>
<td align="right">21.43852</td>
<td align="right">22.57433</td>
<td align="right">24.71352</td>
<td align="right">26.54201</td>
</tr>
<tr>
<th scope="row">151.5</th>
<td align="right">14.94687</td>
<td align="right">15.25152</td>
<td align="right">15.7647</td>
<td align="right">16.77074</td>
<td align="right">18.19367</td>
<td align="right">20.12866</td>
<td align="right">21.50748</td>
<td align="right">22.64724</td>
<td align="right">24.79232</td>
<td align="right">26.62395</td>
</tr>
<tr>
<th scope="row">152.5</th>
<td align="right">14.98609</td>
<td align="right">15.2923</td>
<td align="right">15.80809</td>
<td align="right">16.81914</td>
<td align="right">18.24884</td>
<td align="right">20.19227</td>
<td align="right">21.57636</td>
<td align="right">22.71993</td>
<td align="right">24.87058</td>
<td align="right">26.70501</td>
</tr>
<tr>
<th scope="row">153.5</th>
<td align="right">15.02571</td>
<td align="right">15.33347</td>
<td align="right">15.85184</td>
<td align="right">16.86786</td>
<td align="right">18.30426</td>
<td align="right">20.25594</td>
<td align="right">21.64517</td>
<td align="right">22.7924</td>
<td align="right">24.94829</td>
<td align="right">26.78521</td>
</tr>
<tr>
<th scope="row">154.5</th>
<td align="right">15.06571</td>
<td align="right">15.37501</td>
<td align="right">15.89595</td>
<td align="right">16.91689</td>
<td align="right">18.35989</td>
<td align="right">20.31968</td>
<td align="right">21.71389</td>
<td align="right">22.86465</td>
<td align="right">25.02545</td>
<td align="right">26.86453</td>
</tr>
<tr>
<th scope="row">155.5</th>
<td align="right">15.10609</td>
<td align="right">15.41692</td>
<td align="right">15.94041</td>
<td align="right">16.96621</td>
<td align="right">18.41574</td>
<td align="right">20.38347</td>
<td align="right">21.78252</td>
<td align="right">22.93666</td>
<td align="right">25.10206</td>
<td align="right">26.94297</td>
</tr>
<tr>
<th scope="row">156.5</th>
<td align="right">15.14683</td>
<td align="right">15.45918</td>
<td align="right">15.9852</td>
<td align="right">17.01583</td>
<td align="right">18.4718</td>
<td align="right">20.44731</td>
<td align="right">21.85104</td>
<td align="right">23.00842</td>
<td align="right">25.17811</td>
<td align="right">27.02054</td>
</tr>
<tr>
<th scope="row">157.5</th>
<td align="right">15.18793</td>
<td align="right">15.50179</td>
<td align="right">16.03032</td>
<td align="right">17.06574</td>
<td align="right">18.52805</td>
<td align="right">20.51119</td>
<td align="right">21.91946</td>
<td align="right">23.07994</td>
<td align="right">25.2536</td>
<td align="right">27.09724</td>
</tr>
<tr>
<th scope="row">158.5</th>
<td align="right">15.22938</td>
<td align="right">15.54474</td>
<td align="right">16.07576</td>
<td align="right">17.11592</td>
<td align="right">18.5845</td>
<td align="right">20.5751</td>
<td align="right">21.98777</td>
<td align="right">23.15121</td>
<td align="right">25.32853</td>
<td align="right">27.17307</td>
</tr>
<tr>
<th scope="row">159.5</th>
<td align="right">15.27116</td>
<td align="right">15.58801</td>
<td align="right">16.12151</td>
<td align="right">17.16636</td>
<td align="right">18.64113</td>
<td align="right">20.63903</td>
<td align="right">22.05596</td>
<td align="right">23.22221</td>
<td align="right">25.40289</td>
<td align="right">27.24802</td>
</tr>
<tr>
<th scope="row">160.5</th>
<td align="right">15.31327</td>
<td align="right">15.63161</td>
<td align="right">16.16756</td>
<td align="right">17.21706</td>
<td align="right">18.69793</td>
<td align="right">20.70298</td>
<td align="right">22.12402</td>
<td align="right">23.29295</td>
<td align="right">25.47668</td>
<td align="right">27.32211</td>
</tr>
<tr>
<th scope="row">161.5</th>
<td align="right">15.3557</td>
<td align="right">15.67551</td>
<td align="right">16.21391</td>
<td align="right">17.26801</td>
<td align="right">18.75489</td>
<td align="right">20.76694</td>
<td align="right">22.19194</td>
<td align="right">23.36342</td>
<td align="right">25.5499</td>
<td align="right">27.39534</td>
</tr>
<tr>
<th scope="row">162.5</th>
<td align="right">15.39843</td>
<td align="right">15.71971</td>
<td align="right">16.26054</td>
<td align="right">17.3192</td>
<td align="right">18.81202</td>
<td align="right">20.8309</td>
<td align="right">22.25973</td>
<td align="right">23.43362</td>
<td align="right">25.62256</td>
<td align="right">27.46771</td>
</tr>
<tr>
<th scope="row">163.5</th>
<td align="right">15.44147</td>
<td align="right">15.7642</td>
<td align="right">16.30743</td>
<td align="right">17.37062</td>
<td align="right">18.86929</td>
<td align="right">20.89486</td>
<td align="right">22.32737</td>
<td align="right">23.50354</td>
<td align="right">25.69464</td>
<td align="right">27.53924</td>
</tr>
<tr>
<th scope="row">164.5</th>
<td align="right">15.48479</td>
<td align="right">15.80897</td>
<td align="right">16.3546</td>
<td align="right">17.42227</td>
<td align="right">18.9267</td>
<td align="right">20.9588</td>
<td align="right">22.39487</td>
<td align="right">23.57318</td>
<td align="right">25.76616</td>
<td align="right">27.60992</td>
</tr>
<tr>
<th scope="row">165.5</th>
<td align="right">15.52839</td>
<td align="right">15.85401</td>
<td align="right">16.40201</td>
<td align="right">17.47412</td>
<td align="right">18.98424</td>
<td align="right">21.02272</td>
<td align="right">22.46221</td>
<td align="right">23.64253</td>
<td align="right">25.83712</td>
<td align="right">27.67977</td>
</tr>
<tr>
<th scope="row">166.5</th>
<td align="right">15.57226</td>
<td align="right">15.89931</td>
<td align="right">16.44967</td>
<td align="right">17.52618</td>
<td align="right">19.04191</td>
<td align="right">21.08663</td>
<td align="right">22.52939</td>
<td align="right">23.7116</td>
<td align="right">25.90751</td>
<td align="right">27.74879</td>
</tr>
<tr>
<th scope="row">167.5</th>
<td align="right">15.61638</td>
<td align="right">15.94486</td>
<td align="right">16.49756</td>
<td align="right">17.57843</td>
<td align="right">19.0997</td>
<td align="right">21.15049</td>
<td align="right">22.5964</td>
<td align="right">23.78038</td>
<td align="right">25.97734</td>
<td align="right">27.817</td>
</tr>
<tr>
<th scope="row">168.5</th>
<td align="right">15.66076</td>
<td align="right">15.99065</td>
<td align="right">16.54568</td>
<td align="right">17.63086</td>
<td align="right">19.15759</td>
<td align="right">21.21433</td>
<td align="right">22.66325</td>
<td align="right">23.84887</td>
<td align="right">26.04662</td>
<td align="right">27.88441</td>
</tr>
<tr>
<th scope="row">169.5</th>
<td align="right">15.70536</td>
<td align="right">16.03667</td>
<td align="right">16.594</td>
<td align="right">17.68347</td>
<td align="right">19.21558</td>
<td align="right">21.27811</td>
<td align="right">22.72993</td>
<td align="right">23.91706</td>
<td align="right">26.11535</td>
<td align="right">27.95102</td>
</tr>
<tr>
<th scope="row">170.5</th>
<td align="right">15.75019</td>
<td align="right">16.0829</td>
<td align="right">16.64254</td>
<td align="right">17.73624</td>
<td align="right">19.27366</td>
<td align="right">21.34185</td>
<td align="right">22.79643</td>
<td align="right">23.98496</td>
<td align="right">26.18353</td>
<td align="right">28.01686</td>
</tr>
<tr>
<th scope="row">171.5</th>
<td align="right">15.79524</td>
<td align="right">16.12934</td>
<td align="right">16.69126</td>
<td align="right">17.78917</td>
<td align="right">19.33182</td>
<td align="right">21.40554</td>
<td align="right">22.86275</td>
<td align="right">24.05257</td>
<td align="right">26.25117</td>
<td align="right">28.08193</td>
</tr>
<tr>
<th scope="row">172.5</th>
<td align="right">15.84049</td>
<td align="right">16.17598</td>
<td align="right">16.74017</td>
<td align="right">17.84225</td>
<td align="right">19.39006</td>
<td align="right">21.46916</td>
<td align="right">22.92889</td>
<td align="right">24.11987</td>
<td align="right">26.31828</td>
<td align="right">28.14624</td>
</tr>
<tr>
<th scope="row">173.5</th>
<td align="right">15.88593</td>
<td align="right">16.2228</td>
<td align="right">16.78924</td>
<td align="right">17.89546</td>
<td align="right">19.44837</td>
<td align="right">21.53272</td>
<td align="right">22.99485</td>
<td align="right">24.18689</td>
<td align="right">26.38485</td>
<td align="right">28.20983</td>
</tr>
<tr>
<th scope="row">174.5</th>
<td align="right">15.93155</td>
<td align="right">16.2698</td>
<td align="right">16.83848</td>
<td align="right">17.9488</td>
<td align="right">19.50673</td>
<td align="right">21.5962</td>
<td align="right">23.06062</td>
<td align="right">24.25361</td>
<td align="right">26.45091</td>
<td align="right">28.27269</td>
</tr>
<tr>
<th scope="row">175.5</th>
<td align="right">15.97734</td>
<td align="right">16.31696</td>
<td align="right">16.88787</td>
<td align="right">18.00225</td>
<td align="right">19.56514</td>
<td align="right">21.65961</td>
<td align="right">23.12619</td>
<td align="right">24.32003</td>
<td align="right">26.51646</td>
<td align="right">28.33484</td>
</tr>
<tr>
<th scope="row">176.5</th>
<td align="right">16.02329</td>
<td align="right">16.36427</td>
<td align="right">16.9374</td>
<td align="right">18.05581</td>
<td align="right">19.6236</td>
<td align="right">21.72294</td>
<td align="right">23.19158</td>
<td align="right">24.38616</td>
<td align="right">26.58151</td>
<td align="right">28.39632</td>
</tr>
<tr>
<th scope="row">177.5</th>
<td align="right">16.06939</td>
<td align="right">16.41172</td>
<td align="right">16.98706</td>
<td align="right">18.10947</td>
<td align="right">19.68208</td>
<td align="right">21.78618</td>
<td align="right">23.25677</td>
<td align="right">24.452</td>
<td align="right">26.64606</td>
<td align="right">28.45712</td>
</tr>
<tr>
<th scope="row">178.5</th>
<td align="right">16.11562</td>
<td align="right">16.4593</td>
<td align="right">17.03683</td>
<td align="right">18.16322</td>
<td align="right">19.7406</td>
<td align="right">21.84932</td>
<td align="right">23.32177</td>
<td align="right">24.51755</td>
<td align="right">26.71014</td>
<td align="right">28.51728</td>
</tr>
<tr>
<th scope="row">179.5</th>
<td align="right">16.16198</td>
<td align="right">16.507</td>
<td align="right">17.08672</td>
<td align="right">18.21704</td>
<td align="right">19.79912</td>
<td align="right">21.91237</td>
<td align="right">23.38657</td>
<td align="right">24.58281</td>
<td align="right">26.77374</td>
<td align="right">28.57682</td>
</tr>
<tr>
<th scope="row">180.5</th>
<td align="right">16.20844</td>
<td align="right">16.55481</td>
<td align="right">17.1367</td>
<td align="right">18.27093</td>
<td align="right">19.85766</td>
<td align="right">21.97532</td>
<td align="right">23.45117</td>
<td align="right">24.64778</td>
<td align="right">26.83688</td>
<td align="right">28.63575</td>
</tr>
<tr>
<th scope="row">181.5</th>
<td align="right">16.25501</td>
<td align="right">16.60271</td>
<td align="right">17.18676</td>
<td align="right">18.32488</td>
<td align="right">19.9162</td>
<td align="right">22.03816</td>
<td align="right">23.51557</td>
<td align="right">24.71247</td>
<td align="right">26.89958</td>
<td align="right">28.6941</td>
</tr>
<tr>
<th scope="row">182.5</th>
<td align="right">16.30166</td>
<td align="right">16.6507</td>
<td align="right">17.23689</td>
<td align="right">18.37887</td>
<td align="right">19.97473</td>
<td align="right">22.10089</td>
<td align="right">23.57978</td>
<td align="right">24.77688</td>
<td align="right">26.96184</td>
<td align="right">28.75189</td>
</tr>
<tr>
<th scope="row">183.5</th>
<td align="right">16.34839</td>
<td align="right">16.69875</td>
<td align="right">17.28709</td>
<td align="right">18.4329</td>
<td align="right">20.03324</td>
<td align="right">22.1635</td>
<td align="right">23.64378</td>
<td align="right">24.84102</td>
<td align="right">27.02368</td>
<td align="right">28.80915</td>
</tr>
<tr>
<th scope="row">184.5</th>
<td align="right">16.39519</td>
<td align="right">16.74687</td>
<td align="right">17.33734</td>
<td align="right">18.48696</td>
<td align="right">20.09172</td>
<td align="right">22.226</td>
<td align="right">23.70758</td>
<td align="right">24.90489</td>
<td align="right">27.08511</td>
<td align="right">28.8659</td>
</tr>
<tr>
<th scope="row">185.5</th>
<td align="right">16.44203</td>
<td align="right">16.79503</td>
<td align="right">17.38763</td>
<td align="right">18.54102</td>
<td align="right">20.15017</td>
<td align="right">22.28837</td>
<td align="right">23.77119</td>
<td align="right">24.96848</td>
<td align="right">27.14616</td>
<td align="right">28.92217</td>
</tr>
<tr>
<th scope="row">186.5</th>
<td align="right">16.48892</td>
<td align="right">16.84323</td>
<td align="right">17.43794</td>
<td align="right">18.5951</td>
<td align="right">20.20858</td>
<td align="right">22.35061</td>
<td align="right">23.83459</td>
<td align="right">25.03182</td>
<td align="right">27.20683</td>
<td align="right">28.97798</td>
</tr>
<tr>
<th scope="row">187.5</th>
<td align="right">16.53583</td>
<td align="right">16.89146</td>
<td align="right">17.48827</td>
<td align="right">18.64916</td>
<td align="right">20.26694</td>
<td align="right">22.41272</td>
<td align="right">23.89779</td>
<td align="right">25.0949</td>
<td align="right">27.26714</td>
<td align="right">29.03337</td>
</tr>
<tr>
<th scope="row">188.5</th>
<td align="right">16.58276</td>
<td align="right">16.93969</td>
<td align="right">17.53861</td>
<td align="right">18.70321</td>
<td align="right">20.32524</td>
<td align="right">22.47469</td>
<td align="right">23.9608</td>
<td align="right">25.15773</td>
<td align="right">27.3271</td>
<td align="right">29.08835</td>
</tr>
<tr>
<th scope="row">189.5</th>
<td align="right">16.62969</td>
<td align="right">16.98792</td>
<td align="right">17.58893</td>
<td align="right">18.75723</td>
<td align="right">20.38346</td>
<td align="right">22.53652</td>
<td align="right">24.02361</td>
<td align="right">25.22032</td>
<td align="right">27.38675</td>
<td align="right">29.14297</td>
</tr>
<tr>
<th scope="row">190.5</th>
<td align="right">16.67661</td>
<td align="right">17.03615</td>
<td align="right">17.63924</td>
<td align="right">18.81121</td>
<td align="right">20.44162</td>
<td align="right">22.59821</td>
<td align="right">24.08622</td>
<td align="right">25.28267</td>
<td align="right">27.44609</td>
<td align="right">29.19725</td>
</tr>
<tr>
<th scope="row">191.5</th>
<td align="right">16.72351</td>
<td align="right">17.08434</td>
<td align="right">17.68951</td>
<td align="right">18.86514</td>
<td align="right">20.49968</td>
<td align="right">22.65976</td>
<td align="right">24.14864</td>
<td align="right">25.34478</td>
<td align="right">27.50514</td>
<td align="right">29.25123</td>
</tr>
<tr>
<th scope="row">192.5</th>
<td align="right">16.77038</td>
<td align="right">17.1325</td>
<td align="right">17.73974</td>
<td align="right">18.919</td>
<td align="right">20.55765</td>
<td align="right">22.72115</td>
<td align="right">24.21087</td>
<td align="right">25.40668</td>
<td align="right">27.56393</td>
<td align="right">29.30493</td>
</tr>
<tr>
<th scope="row">193.5</th>
<td align="right">16.8172</td>
<td align="right">17.18061</td>
<td align="right">17.78991</td>
<td align="right">18.97279</td>
<td align="right">20.61551</td>
<td align="right">22.78239</td>
<td align="right">24.27291</td>
<td align="right">25.46835</td>
<td align="right">27.62247</td>
<td align="right">29.35838</td>
</tr>
<tr>
<th scope="row">194.5</th>
<td align="right">16.86396</td>
<td align="right">17.22865</td>
<td align="right">17.84001</td>
<td align="right">19.0265</td>
<td align="right">20.67326</td>
<td align="right">22.84346</td>
<td align="right">24.33476</td>
<td align="right">25.52982</td>
<td align="right">27.68078</td>
<td align="right">29.41164</td>
</tr>
<tr>
<th scope="row">195.5</th>
<td align="right">16.91065</td>
<td align="right">17.27662</td>
<td align="right">17.89003</td>
<td align="right">19.08011</td>
<td align="right">20.73089</td>
<td align="right">22.90438</td>
<td align="right">24.39642</td>
<td align="right">25.59109</td>
<td align="right">27.7389</td>
<td align="right">29.46472</td>
</tr>
<tr>
<th scope="row">196.5</th>
<td align="right">16.95725</td>
<td align="right">17.3245</td>
<td align="right">17.93995</td>
<td align="right">19.13361</td>
<td align="right">20.78839</td>
<td align="right">22.96514</td>
<td align="right">24.4579</td>
<td align="right">25.65217</td>
<td align="right">27.79683</td>
<td align="right">29.51767</td>
</tr>
<tr>
<th scope="row">197.5</th>
<td align="right">17.00375</td>
<td align="right">17.37229</td>
<td align="right">17.98977</td>
<td align="right">19.187</td>
<td align="right">20.84574</td>
<td align="right">23.02572</td>
<td align="right">24.5192</td>
<td align="right">25.71306</td>
<td align="right">27.85461</td>
<td align="right">29.57051</td>
</tr>
<tr>
<th scope="row">198.5</th>
<td align="right">17.05015</td>
<td align="right">17.41995</td>
<td align="right">18.03947</td>
<td align="right">19.24025</td>
<td align="right">20.90294</td>
<td align="right">23.08614</td>
<td align="right">24.58033</td>
<td align="right">25.77379</td>
<td align="right">27.91225</td>
<td align="right">29.6233</td>
</tr>
<tr>
<th scope="row">199.5</th>
<td align="right">17.09642</td>
<td align="right">17.46749</td>
<td align="right">18.08904</td>
<td align="right">19.29335</td>
<td align="right">20.95999</td>
<td align="right">23.14638</td>
<td align="right">24.64128</td>
<td align="right">25.83436</td>
<td align="right">27.96979</td>
<td align="right">29.67606</td>
</tr>
<tr>
<th scope="row">200.5</th>
<td align="right">17.14256</td>
<td align="right">17.51489</td>
<td align="right">18.13846</td>
<td align="right">19.3463</td>
<td align="right">21.01686</td>
<td align="right">23.20645</td>
<td align="right">24.70207</td>
<td align="right">25.89477</td>
<td align="right">28.02724</td>
<td align="right">29.72885</td>
</tr>
<tr>
<th scope="row">201.5</th>
<td align="right">17.18854</td>
<td align="right">17.56214</td>
<td align="right">18.18773</td>
<td align="right">19.39908</td>
<td align="right">21.07356</td>
<td align="right">23.26633</td>
<td align="right">24.76269</td>
<td align="right">25.95504</td>
<td align="right">28.08464</td>
<td align="right">29.78169</td>
</tr>
<tr>
<th scope="row">202.5</th>
<td align="right">17.23437</td>
<td align="right">17.60923</td>
<td align="right">18.23682</td>
<td align="right">19.45168</td>
<td align="right">21.13007</td>
<td align="right">23.32604</td>
<td align="right">24.82315</td>
<td align="right">26.01519</td>
<td align="right">28.142</td>
<td align="right">29.83463</td>
</tr>
<tr>
<th scope="row">203.5</th>
<td align="right">17.28002</td>
<td align="right">17.65613</td>
<td align="right">18.28573</td>
<td align="right">19.50409</td>
<td align="right">21.18638</td>
<td align="right">23.38556</td>
<td align="right">24.88346</td>
<td align="right">26.07522</td>
<td align="right">28.19937</td>
<td align="right">29.88771</td>
</tr>
<tr>
<th scope="row">204.5</th>
<td align="right">17.32548</td>
<td align="right">17.70284</td>
<td align="right">18.33444</td>
<td align="right">19.55629</td>
<td align="right">21.24248</td>
<td align="right">23.4449</td>
<td align="right">24.94362</td>
<td align="right">26.13515</td>
<td align="right">28.25676</td>
<td align="right">29.94097</td>
</tr>
<tr>
<th scope="row">205.5</th>
<td align="right">17.37074</td>
<td align="right">17.74935</td>
<td align="right">18.38294</td>
<td align="right">19.60827</td>
<td align="right">21.29836</td>
<td align="right">23.50404</td>
<td align="right">25.00363</td>
<td align="right">26.19498</td>
<td align="right">28.3142</td>
<td align="right">29.99447</td>
</tr>
<tr>
<th scope="row">206.5</th>
<td align="right">17.41579</td>
<td align="right">17.79564</td>
<td align="right">18.43121</td>
<td align="right">19.66002</td>
<td align="right">21.35402</td>
<td align="right">23.563</td>
<td align="right">25.0635</td>
<td align="right">26.25474</td>
<td align="right">28.37173</td>
<td align="right">30.04824</td>
</tr>
<tr>
<th scope="row">207.5</th>
<td align="right">17.46061</td>
<td align="right">17.8417</td>
<td align="right">18.47925</td>
<td align="right">19.71153</td>
<td align="right">21.40944</td>
<td align="right">23.62176</td>
<td align="right">25.12324</td>
<td align="right">26.31443</td>
<td align="right">28.42937</td>
<td align="right">30.10232</td>
</tr>
<tr>
<th scope="row">208.5</th>
<td align="right">17.50518</td>
<td align="right">17.88751</td>
<td align="right">18.52703</td>
<td align="right">19.76278</td>
<td align="right">21.46461</td>
<td align="right">23.68033</td>
<td align="right">25.18286</td>
<td align="right">26.37407</td>
<td align="right">28.48716</td>
<td align="right">30.15677</td>
</tr>
<tr>
<th scope="row">209.5</th>
<td align="right">17.54951</td>
<td align="right">17.93306</td>
<td align="right">18.57455</td>
<td align="right">19.81376</td>
<td align="right">21.51952</td>
<td align="right">23.7387</td>
<td align="right">25.24235</td>
<td align="right">26.43368</td>
<td align="right">28.54513</td>
<td align="right">30.21164</td>
</tr>
<tr>
<th scope="row">210.5</th>
<td align="right">17.59356</td>
<td align="right">17.97834</td>
<td align="right">18.62179</td>
<td align="right">19.86445</td>
<td align="right">21.57417</td>
<td align="right">23.79687</td>
<td align="right">25.30173</td>
<td align="right">26.49326</td>
<td align="right">28.6033</td>
<td align="right">30.26696</td>
</tr>
<tr>
<th scope="row">211.5</th>
<td align="right">17.63734</td>
<td align="right">18.02333</td>
<td align="right">18.66873</td>
<td align="right">19.91485</td>
<td align="right">21.62854</td>
<td align="right">23.85484</td>
<td align="right">25.361</td>
<td align="right">26.55284</td>
<td align="right">28.66171</td>
<td align="right">30.3228</td>
</tr>
<tr>
<th scope="row">212.5</th>
<td align="right">17.68082</td>
<td align="right">18.06802</td>
<td align="right">18.71537</td>
<td align="right">19.96493</td>
<td align="right">21.68262</td>
<td align="right">23.91261</td>
<td align="right">25.42017</td>
<td align="right">26.61243</td>
<td align="right">28.72041</td>
<td align="right">30.3792</td>
</tr>
<tr>
<th scope="row">213.5</th>
<td align="right">17.72399</td>
<td align="right">18.11239</td>
<td align="right">18.76168</td>
<td align="right">20.01469</td>
<td align="right">21.7364</td>
<td align="right">23.97018</td>
<td align="right">25.47925</td>
<td align="right">26.67204</td>
<td align="right">28.77941</td>
<td align="right">30.4362</td>
</tr>
<tr>
<th scope="row">214.5</th>
<td align="right">17.76683</td>
<td align="right">18.15644</td>
<td align="right">18.80766</td>
<td align="right">20.06412</td>
<td align="right">21.78988</td>
<td align="right">24.02754</td>
<td align="right">25.53824</td>
<td align="right">26.73169</td>
<td align="right">28.83875</td>
<td align="right">30.49387</td>
</tr>
<tr>
<th scope="row">215.5</th>
<td align="right">17.80934</td>
<td align="right">18.20014</td>
<td align="right">18.85328</td>
<td align="right">20.11319</td>
<td align="right">21.84304</td>
<td align="right">24.0847</td>
<td align="right">25.59716</td>
<td align="right">26.79141</td>
<td align="right">28.89848</td>
<td align="right">30.55225</td>
</tr>
<tr>
<th scope="row">216.5</th>
<td align="right">17.8515</td>
<td align="right">18.24349</td>
<td align="right">18.89854</td>
<td align="right">20.1619</td>
<td align="right">21.89587</td>
<td align="right">24.14166</td>
<td align="right">25.65601</td>
<td align="right">26.8512</td>
<td align="right">28.95862</td>
<td align="right">30.6114</td>
</tr>
<tr>
<th scope="row">217.5</th>
<td align="right">17.89329</td>
<td align="right">18.28646</td>
<td align="right">18.94342</td>
<td align="right">20.21022</td>
<td align="right">21.94836</td>
<td align="right">24.19841</td>
<td align="right">25.71481</td>
<td align="right">26.91109</td>
<td align="right">29.01921</td>
<td align="right">30.67137</td>
</tr>
<tr>
<th scope="row">218.5</th>
<td align="right">17.93471</td>
<td align="right">18.32904</td>
<td align="right">18.98791</td>
<td align="right">20.25816</td>
<td align="right">22.00051</td>
<td align="right">24.25495</td>
<td align="right">25.77355</td>
<td align="right">26.97108</td>
<td align="right">29.0803</td>
<td align="right">30.73222</td>
</tr>
<tr>
<th scope="row">219.5</th>
<td align="right">17.97573</td>
<td align="right">18.37122</td>
<td align="right">19.03198</td>
<td align="right">20.30569</td>
<td align="right">22.05229</td>
<td align="right">24.31129</td>
<td align="right">25.83225</td>
<td align="right">27.03121</td>
<td align="right">29.14191</td>
<td align="right">30.794</td>
</tr>
<tr>
<th scope="row">220.5</th>
<td align="right">18.01634</td>
<td align="right">18.41299</td>
<td align="right">19.07563</td>
<td align="right">20.35279</td>
<td align="right">22.10371</td>
<td align="right">24.36742</td>
<td align="right">25.89093</td>
<td align="right">27.09149</td>
<td align="right">29.20409</td>
<td align="right">30.85677</td>
</tr>
<tr>
<th scope="row">221.5</th>
<td align="right">18.05652</td>
<td align="right">18.45432</td>
<td align="right">19.11884</td>
<td align="right">20.39947</td>
<td align="right">22.15476</td>
<td align="right">24.42335</td>
<td align="right">25.94958</td>
<td align="right">27.15194</td>
<td align="right">29.26687</td>
<td align="right">30.92058</td>
</tr>
<tr>
<th scope="row">222.5</th>
<td align="right">18.09626</td>
<td align="right">18.4952</td>
<td align="right">19.16159</td>
<td align="right">20.44569</td>
<td align="right">22.20541</td>
<td align="right">24.47907</td>
<td align="right">26.00823</td>
<td align="right">27.21259</td>
<td align="right">29.3303</td>
<td align="right">30.9855</td>
</tr>
<tr>
<th scope="row">223.5</th>
<td align="right">18.13555</td>
<td align="right">18.53562</td>
<td align="right">19.20387</td>
<td align="right">20.49145</td>
<td align="right">22.25567</td>
<td align="right">24.53459</td>
<td align="right">26.06687</td>
<td align="right">27.27344</td>
<td align="right">29.39442</td>
<td align="right">31.05158</td>
</tr>
<tr>
<th scope="row">224.5</th>
<td align="right">18.17437</td>
<td align="right">18.57556</td>
<td align="right">19.24567</td>
<td align="right">20.53674</td>
<td align="right">22.30553</td>
<td align="right">24.58991</td>
<td align="right">26.12553</td>
<td align="right">27.33452</td>
<td align="right">29.45926</td>
<td align="right">31.11888</td>
</tr>
<tr>
<th scope="row">225.5</th>
<td align="right">18.2127</td>
<td align="right">18.615</td>
<td align="right">19.28696</td>
<td align="right">20.58153</td>
<td align="right">22.35497</td>
<td align="right">24.64502</td>
<td align="right">26.18422</td>
<td align="right">27.39585</td>
<td align="right">29.52487</td>
<td align="right">31.18746</td>
</tr>
<tr>
<th scope="row">226.5</th>
<td align="right">18.25052</td>
<td align="right">18.65393</td>
<td align="right">19.32773</td>
<td align="right">20.62582</td>
<td align="right">22.40399</td>
<td align="right">24.69994</td>
<td align="right">26.24294</td>
<td align="right">27.45746</td>
<td align="right">29.5913</td>
<td align="right">31.25739</td>
</tr>
<tr>
<th scope="row">227.5</th>
<td align="right">18.28782</td>
<td align="right">18.69233</td>
<td align="right">19.36797</td>
<td align="right">20.66959</td>
<td align="right">22.45257</td>
<td align="right">24.75466</td>
<td align="right">26.30171</td>
<td align="right">27.51936</td>
<td align="right">29.65857</td>
<td align="right">31.32872</td>
</tr>
<tr>
<th scope="row">228.5</th>
<td align="right">18.32459</td>
<td align="right">18.73019</td>
<td align="right">19.40766</td>
<td align="right">20.71283</td>
<td align="right">22.50072</td>
<td align="right">24.80919</td>
<td align="right">26.36054</td>
<td align="right">27.58159</td>
<td align="right">29.72674</td>
<td align="right">31.40152</td>
</tr>
<tr>
<th scope="row">229.5</th>
<td align="right">18.3608</td>
<td align="right">18.76748</td>
<td align="right">19.44678</td>
<td align="right">20.75552</td>
<td align="right">22.54841</td>
<td align="right">24.86352</td>
<td align="right">26.41945</td>
<td align="right">27.64415</td>
<td align="right">29.79585</td>
<td align="right">31.47585</td>
</tr>
<tr>
<th scope="row">230.5</th>
<td align="right">18.39643</td>
<td align="right">18.8042</td>
<td align="right">19.48531</td>
<td align="right">20.79766</td>
<td align="right">22.59565</td>
<td align="right">24.91767</td>
<td align="right">26.47844</td>
<td align="right">27.70707</td>
<td align="right">29.86595</td>
<td align="right">31.55178</td>
</tr>
<tr>
<th scope="row">231.5</th>
<td align="right">18.43148</td>
<td align="right">18.84031</td>
<td align="right">19.52325</td>
<td align="right">20.83922</td>
<td align="right">22.64243</td>
<td align="right">24.97163</td>
<td align="right">26.53753</td>
<td align="right">27.77039</td>
<td align="right">29.93707</td>
<td align="right">31.62937</td>
</tr>
<tr>
<th scope="row">232.5</th>
<td align="right">18.46591</td>
<td align="right">18.87581</td>
<td align="right">19.56057</td>
<td align="right">20.88019</td>
<td align="right">22.68873</td>
<td align="right">25.02542</td>
<td align="right">26.59675</td>
<td align="right">27.83411</td>
<td align="right">30.00927</td>
<td align="right">31.70868</td>
</tr>
<tr>
<th scope="row">233.5</th>
<td align="right">18.49972</td>
<td align="right">18.91068</td>
<td align="right">19.59726</td>
<td align="right">20.92056</td>
<td align="right">22.73456</td>
<td align="right">25.07902</td>
<td align="right">26.65609</td>
<td align="right">27.89828</td>
<td align="right">30.08258</td>
<td align="right">31.78979</td>
</tr>
<tr>
<th scope="row">234.5</th>
<td align="right">18.53287</td>
<td align="right">18.94489</td>
<td align="right">19.6333</td>
<td align="right">20.96032</td>
<td align="right">22.7799</td>
<td align="right">25.13246</td>
<td align="right">26.71558</td>
<td align="right">27.9629</td>
<td align="right">30.15706</td>
<td align="right">31.87275</td>
</tr>
<tr>
<th scope="row">235.5</th>
<td align="right">18.56536</td>
<td align="right">18.97844</td>
<td align="right">19.66867</td>
<td align="right">20.99946</td>
<td align="right">22.82474</td>
<td align="right">25.18572</td>
<td align="right">26.77522</td>
<td align="right">28.02801</td>
<td align="right">30.23276</td>
<td align="right">31.95764</td>
</tr>
<tr>
<th scope="row">236.5</th>
<td align="right">18.59716</td>
<td align="right">19.01129</td>
<td align="right">19.70335</td>
<td align="right">21.03795</td>
<td align="right">22.86909</td>
<td align="right">25.23883</td>
<td align="right">26.83505</td>
<td align="right">28.09363</td>
<td align="right">30.30971</td>
<td align="right">32.04453</td>
</tr>
<tr>
<th scope="row">237.5</th>
<td align="right">18.62825</td>
<td align="right">19.04343</td>
<td align="right">19.73733</td>
<td align="right">21.07579</td>
<td align="right">22.91293</td>
<td align="right">25.29179</td>
<td align="right">26.89507</td>
<td align="right">28.15978</td>
<td align="right">30.38797</td>
<td align="right">32.13348</td>
</tr>
<tr>
<th scope="row">238.5</th>
<td align="right">18.65861</td>
<td align="right">19.07484</td>
<td align="right">19.7706</td>
<td align="right">21.11296</td>
<td align="right">22.95626</td>
<td align="right">25.34459</td>
<td align="right">26.9553</td>
<td align="right">28.2265</td>
<td align="right">30.46758</td>
<td align="right">32.22457</td>
</tr>
<tr>
<th scope="row">239.5</th>
<td align="right">18.68822</td>
<td align="right">19.10551</td>
<td align="right">19.80312</td>
<td align="right">21.14946</td>
<td>22.99908</td>
<td align="right">25.39725</td>
<td align="right">27.01575</td>
<td align="right">28.29381</td>
<td align="right">30.54859</td>
<td align="right">32.31787</td>
</tr>
<tr>
<th scope="row">240</th>
<td align="right">18.70274</td>
<td align="right">19.12055</td>
<td align="right">19.8191</td>
<td align="right">21.16745</td>
<td align="right">23.02029</td>
<td align="right">25.42353</td>
<td align="right">27.04607</td>
<td align="right">28.3277</td>
<td align="right">30.58964</td>
<td align="right">32.36537</td>
</tr>
<tr>
<th scope="row">240.5</th>
<td align="right">18.71706</td>
<td align="right">19.1354</td>
<td align="right">19.83489</td>
<td align="right">21.18526</td>
<td align="right">23.04138</td>
<td align="right">25.44978</td>
<td align="right">27.07645</td>
<td align="right">28.36174</td>
<td align="right">30.63106</td>
<td align="right">32.41344</td>
</tr>



                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
  include 'footer.php';
?>

