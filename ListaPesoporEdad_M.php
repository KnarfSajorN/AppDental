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
                    <th scope="col">Age (in months)</th>
                    <th scope="col">3rd Percentile Weight (in kilograms)</th>
                    <th scope="col">5th Percentile Weight (in kilograms)</th>
                    <th scope="col">10th Percentile Weight (in kilograms)</th>
                    <th scope="col">25th Percentile Weight (in kilograms)</th>
                    <th scope="col">50th Percentile Weight (in kilograms)</th>
                    <th scope="col">75th Percentile Weight (in kilograms)</th>
                    <th scope="col">90th Percentile Weight (in kilograms)</th>
                    <th scope="col">95th Percentile Weight (in kilograms)</th>
                    <th scope="col">97th Percentile Weight (in kilograms)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
<th scope="row">0</th>
<td>2.414112</td>
<td>2.547905</td>
<td>2.747222</td>
<td>3.064865</td>
<td>3.399186</td>
<td>3.717519</td>
<td>3.992572</td>
<td>4.152637</td>
<td>4.254922</td>
</tr>
<tr>
<th scope="row">0.5</th>
<td>2.756917</td>
<td>2.894442</td>
<td>3.101767</td>
<td>3.437628</td>
<td>3.797528</td>
<td>4.145594</td>
<td>4.450126</td>
<td>4.628836</td>
<td>4.743582</td>
</tr>
<tr>
<th scope="row">1.5</th>
<td>3.402293</td>
<td>3.54761</td>
<td>3.770157</td>
<td>4.138994</td>
<td>4.544777</td>
<td>4.946766</td>
<td>5.305632</td>
<td>5.519169</td>
<td>5.657379</td>
</tr>
<tr>
<th scope="row">2.5</th>
<td>3.997806</td>
<td>4.150639</td>
<td>4.387042</td>
<td>4.78482</td>
<td>5.230584</td>
<td>5.680083</td>
<td>6.087641</td>
<td>6.332837</td>
<td>6.492574</td>
</tr>
<tr>
<th scope="row">3.5</th>
<td>4.547383</td>
<td>4.707123</td>
<td>4.955926</td>
<td>5.379141</td>
<td>5.859961</td>
<td>6.351512</td>
<td>6.80277</td>
<td>7.076723</td>
<td>7.256166</td>
</tr>
<tr>
<th scope="row">4.5</th>
<td>5.054539</td>
<td>5.220488</td>
<td>5.480295</td>
<td>5.925888</td>
<td>6.437588</td>
<td>6.966524</td>
<td>7.457119</td>
<td>7.757234</td>
<td>7.95473</td>
</tr>
<tr>
<th scope="row">5.5</th>
<td>5.5225</td>
<td>5.693974</td>
<td>5.96351</td>
<td>6.428828</td>
<td>6.96785</td>
<td>7.53018</td>
<td>8.056331</td>
<td>8.38033</td>
<td>8.594413</td>
</tr>
<tr>
<th scope="row">6.5</th>
<td>5.954272</td>
<td>6.130641</td>
<td>6.408775</td>
<td>6.891533</td>
<td>7.454854</td>
<td>8.047178</td>
<td>8.605636</td>
<td>8.951544</td>
<td>9.180938</td>
</tr>
<tr>
<th scope="row">7.5</th>
<td>6.352668</td>
<td>6.533373</td>
<td>6.819122</td>
<td>7.317373</td>
<td>7.902436</td>
<td>8.521877</td>
<td>9.109878</td>
<td>9.476009</td>
<td>9.719621</td>
</tr>
<tr>
<th scope="row">8.5</th>
<td>6.720328</td>
<td>6.904886</td>
<td>7.197414</td>
<td>7.709516</td>
<td>8.314178</td>
<td>8.958324</td>
<td>9.573546</td>
<td>9.95848</td>
<td>10.21539</td>
</tr>
<tr>
<th scope="row">9.5</th>
<td>7.059732</td>
<td>7.247736</td>
<td>7.546342</td>
<td>8.070932</td>
<td>8.693418</td>
<td>9.360271</td>
<td>10.00079</td>
<td>10.40335</td>
<td>10.6728</td>
</tr>
<tr>
<th scope="row">10.5</th>
<td>7.373212</td>
<td>7.564327</td>
<td>7.868436</td>
<td>8.4044</td>
<td>9.043262</td>
<td>9.731193</td>
<td>10.39545</td>
<td>10.8147</td>
<td>11.09607</td>
</tr>
<tr>
<th scope="row">11.5</th>
<td>7.662959</td>
<td>7.856916</td>
<td>8.166069</td>
<td>8.712513</td>
<td>9.366594</td>
<td>10.07431</td>
<td>10.76106</td>
<td>11.19625</td>
<td>11.48908</td>
</tr>
<tr>
<th scope="row">12.5</th>
<td>7.93103</td>
<td>8.127621</td>
<td>8.44146</td>
<td>8.997692</td>
<td>9.666089</td>
<td>10.39258</td>
<td>11.10089</td>
<td>11.55145</td>
<td>11.85539</td>
</tr>
<tr>
<th scope="row">13.5</th>
<td>8.179356</td>
<td>8.378425</td>
<td>8.696684</td>
<td>9.262185</td>
<td>9.944226</td>
<td>10.68874</td>
<td>11.41792</td>
<td>11.88348</td>
<td>12.19829</td>
</tr>
<tr>
<th scope="row">14.5</th>
<td>8.409744</td>
<td>8.611186</td>
<td>8.93368</td>
<td>9.508085</td>
<td>10.20329</td>
<td>10.96532</td>
<td>11.71491</td>
<td>12.19522</td>
<td>12.52078</td>
</tr>
<tr>
<th scope="row">15.5</th>
<td>8.623887</td>
<td>8.827638</td>
<td>9.154251</td>
<td>9.737329</td>
<td>10.44541</td>
<td>11.22463</td>
<td>11.99438</td>
<td>12.48934</td>
<td>12.82561</td>
</tr>
<tr>
<th scope="row">16.5</th>
<td>8.82337</td>
<td>9.029399</td>
<td>9.360079</td>
<td>9.951715</td>
<td>10.67251</td>
<td>11.46878</td>
<td>12.25862</td>
<td>12.76825</td>
<td>13.11527</td>
</tr>
<tr>
<th scope="row">17.5</th>
<td>9.009668</td>
<td>9.21798</td>
<td>9.552723</td>
<td>10.1529</td>
<td>10.88639</td>
<td>11.69972</td>
<td>12.50974</td>
<td>13.03415</td>
<td>13.39204</td>
</tr>
<tr>
<th scope="row">18.5</th>
<td>9.18416</td>
<td>9.394782</td>
<td>9.73363</td>
<td>10.34241</td>
<td>11.08868</td>
<td>11.91921</td>
<td>12.74964</td>
<td>13.28904</td>
<td>13.65799</td>
</tr>
<tr>
<th scope="row">19.5</th>
<td>9.348127</td>
<td>9.56111</td>
<td>9.90414</td>
<td>10.52167</td>
<td>11.2809</td>
<td>12.12887</td>
<td>12.98004</td>
<td>13.53473</td>
<td>13.91497</td>
</tr>
<tr>
<th scope="row">20.5</th>
<td>9.50276</td>
<td>9.71817</td>
<td>10.06549</td>
<td>10.69196</td>
<td>11.4644</td>
<td>12.33016</td>
<td>13.2025</td>
<td>13.77284</td>
<td>14.16467</td>
</tr>
<tr>
<th scope="row">21.5</th>
<td>9.649162</td>
<td>9.867081</td>
<td>10.21882</td>
<td>10.85446</td>
<td>11.64043</td>
<td>12.52439</td>
<td>13.41844</td>
<td>14.00484</td>
<td>14.40858</td>
</tr>
<tr>
<th scope="row">22.5</th>
<td>9.788355</td>
<td>10.00887</td>
<td>10.36518</td>
<td>11.01027</td>
<td>11.81014</td>
<td>12.71277</td>
<td>13.62911</td>
<td>14.23205</td>
<td>14.64807</td>
</tr>
<tr>
<th scope="row">23.5</th>
<td>9.921281</td>
<td>10.1445</td>
<td>10.50553</td>
<td>11.16037</td>
<td>11.97454</td>
<td>12.89636</td>
<td>13.83564</td>
<td>14.45561</td>
<td>14.88432</td>
</tr>
<tr>
<th scope="row">24</th>
<td>9.985668</td>
<td>10.21027</td>
<td>10.57373</td>
<td>11.23357</td>
<td>12.05504</td>
<td>12.98667</td>
<td>13.93766</td>
<td>14.56636</td>
<td>15.00156</td>
</tr>
<tr>
<th scope="row">24.5</th>
<td>10.04881</td>
<td>10.27483</td>
<td>10.64076</td>
<td>11.30567</td>
<td>12.13456</td>
<td>13.07613</td>
<td>14.03902</td>
<td>14.67659</td>
<td>15.11839</td>
</tr>
<tr>
<th scope="row">25.5</th>
<td>10.17173</td>
<td>10.40066</td>
<td>10.77167</td>
<td>11.44697</td>
<td>12.29102</td>
<td>13.25293</td>
<td>14.24017</td>
<td>14.89587</td>
<td>15.35122</td>
</tr>
<tr>
<th scope="row">26.5</th>
<td>10.29079</td>
<td>10.52274</td>
<td>10.89899</td>
<td>11.58501</td>
<td>12.44469</td>
<td>13.42753</td>
<td>14.43984</td>
<td>15.11428</td>
<td>15.58363</td>
</tr>
<tr>
<th scope="row">27.5</th>
<td>10.40664</td>
<td>10.64171</td>
<td>11.02338</td>
<td>11.72047</td>
<td>12.59622</td>
<td>13.60059</td>
<td>14.63873</td>
<td>15.33249</td>
<td>15.81632</td>
</tr>
<tr>
<th scope="row">28.5</th>
<td>10.5199</td>
<td>10.75819</td>
<td>11.14545</td>
<td>11.85392</td>
<td>12.74621</td>
<td>13.77271</td>
<td>14.83743</td>
<td>15.55113</td>
<td>16.0499</td>
</tr>
<tr>
<th scope="row">29.5</th>
<td>10.63112</td>
<td>10.87273</td>
<td>11.26575</td>
<td>11.98592</td>
<td>12.89517</td>
<td>13.9444</td>
<td>15.03646</td>
<td>15.7707</td>
<td>16.28491</td>
</tr>
<tr>
<th scope="row">30.5</th>
<td>10.74078</td>
<td>10.98581</td>
<td>11.38474</td>
<td>12.11692</td>
<td>13.04357</td>
<td>14.11611</td>
<td>15.23626</td>
<td>15.99164</td>
<td>16.52176</td>
</tr>
<tr>
<th scope="row">31.5</th>
<td>10.84935</td>
<td>11.09789</td>
<td>11.50288</td>
<td>12.24735</td>
<td>13.19181</td>
<td>14.28823</td>
<td>15.43719</td>
<td>16.21432</td>
<td>16.76085</td>
</tr>
<tr>
<th scope="row">32.5</th>
<td>10.95722</td>
<td>11.20934</td>
<td>11.62054</td>
<td>12.37757</td>
<td>13.34023</td>
<td>14.46106</td>
<td>15.63957</td>
<td>16.43904</td>
<td>17.00245</td>
</tr>
<tr>
<th scope="row">33.5</th>
<td>11.06475</td>
<td>11.32054</td>
<td>11.73806</td>
<td>12.50791</td>
<td>13.48913</td>
<td>14.63491</td>
<td>15.84365</td>
<td>16.66605</td>
<td>17.24681</td>
</tr>
<tr>
<th scope="row">34.5</th>
<td>11.17225</td>
<td>11.43177</td>
<td>11.85574</td>
<td>12.63865</td>
<td>13.63877</td>
<td>14.80998</td>
<td>16.04963</td>
<td>16.89553</td>
<td>17.49412</td>
</tr>
<tr>
<th scope="row">35.5</th>
<td>11.28</td>
<td>11.54332</td>
<td>11.97384</td>
<td>12.77001</td>
<td>13.78937</td>
<td>14.98647</td>
<td>16.25767</td>
<td>17.12762</td>
<td>17.7445</td>
</tr>
<tr>
<th scope="row">36.5</th>
<td>11.38824</td>
<td>11.65542</td>
<td>12.09259</td>
<td>12.90222</td>
<td>13.94108</td>
<td>15.16452</td>
<td>16.46789</td>
<td>17.36244</td>
<td>17.99807</td>
</tr>
<tr>
<th scope="row">37.5</th>
<td>11.49718</td>
<td>11.76826</td>
<td>12.21216</td>
<td>13.03542</td>
<td>14.09407</td>
<td>15.34425</td>
<td>16.68038</td>
<td>17.60006</td>
<td>18.25487</td>
</tr>
<tr>
<th scope="row">38.5</th>
<td>11.607</td>
<td>11.88202</td>
<td>12.33273</td>
<td>13.16977</td>
<td>14.24844</td>
<td>15.52574</td>
<td>16.89519</td>
<td>17.8405</td>
<td>18.51494</td>
</tr>
<tr>
<th scope="row">39.5</th>
<td>11.71783</td>
<td>11.99685</td>
<td>12.45442</td>
<td>13.30538</td>
<td>14.40429</td>
<td>15.70905</td>
<td>17.11235</td>
<td>18.08377</td>
<td>18.77826</td>
</tr>
<tr>
<th scope="row">40.5</th>
<td>11.82981</td>
<td>12.11284</td>
<td>12.57735</td>
<td>13.44234</td>
<td>14.56168</td>
<td>15.89422</td>
<td>17.33186</td>
<td>18.32988</td>
<td>19.04483</td>
</tr>
<tr>
<th scope="row">41.5</th>
<td>11.94304</td>
<td>12.23011</td>
<td>12.70158</td>
<td>13.58071</td>
<td>14.72064</td>
<td>16.08126</td>
<td>17.55371</td>
<td>18.57877</td>
<td>19.31458</td>
</tr>
<tr>
<th scope="row">42.5</th>
<td>12.05757</td>
<td>12.34871</td>
<td>12.8272</td>
<td>13.72054</td>
<td>14.88121</td>
<td>16.27016</td>
<td>17.77788</td>
<td>18.83042</td>
<td>19.58748</td>
</tr>
<tr>
<th scope="row">43.5</th>
<td>12.17348</td>
<td>12.4687</td>
<td>12.95423</td>
<td>13.86186</td>
<td>15.04341</td>
<td>16.46093</td>
<td>18.00432</td>
<td>19.08475</td>
<td>19.86343</td>
</tr>
<tr>
<th scope="row">44.5</th>
<td>12.2908</td>
<td>12.59011</td>
<td>13.08271</td>
<td>14.00469</td>
<td>15.20721</td>
<td>16.65353</td>
<td>18.23298</td>
<td>19.34169</td>
<td>20.14237</td>
</tr>
<tr>
<th scope="row">45.5</th>
<td>12.40954</td>
<td>12.71297</td>
<td>13.21265</td>
<td>14.14902</td>
<td>15.37263</td>
<td>16.84793</td>
<td>18.46379</td>
<td>19.60118</td>
<td>20.4242</td>
</tr>
<tr>
<th scope="row">46.5</th>
<td>12.52972</td>
<td>12.83726</td>
<td>13.34405</td>
<td>14.29485</td>
<td>15.53962</td>
<td>17.04408</td>
<td>18.69671</td>
<td>19.86313</td>
<td>20.70884</td>
</tr>
<tr>
<th scope="row">47.5</th>
<td>12.65132</td>
<td>12.96298</td>
<td>13.47689</td>
<td>14.44217</td>
<td>15.70817</td>
<td>17.24195</td>
<td>18.93166</td>
<td>20.12746</td>
<td>20.99619</td>
</tr>
<tr>
<th scope="row">48.5</th>
<td>12.77432</td>
<td>13.09012</td>
<td>13.61116</td>
<td>14.59093</td>
<td>15.87824</td>
<td>17.44149</td>
<td>19.16858</td>
<td>20.39409</td>
<td>21.28616</td>
</tr>
<tr>
<th scope="row">49.5</th>
<td>12.89869</td>
<td>13.21864</td>
<td>13.74682</td>
<td>14.74112</td>
<td>16.04978</td>
<td>17.64265</td>
<td>19.40739</td>
<td>20.66293</td>
<td>21.57866</td>
</tr>
<tr>
<th scope="row">50.5</th>
<td>13.02441</td>
<td>13.3485</td>
<td>13.88384</td>
<td>14.89269</td>
<td>16.22277</td>
<td>17.84537</td>
<td>19.64805</td>
<td>20.93393</td>
<td>21.8736</td>
</tr>
<tr>
<th scope="row">51.5</th>
<td>13.15141</td>
<td>13.47966</td>
<td>14.02217</td>
<td>15.0456</td>
<td>16.39715</td>
<td>18.04961</td>
<td>19.89048</td>
<td>21.20699</td>
<td>22.1709</td>
</tr>
<tr>
<th scope="row">52.5</th>
<td>13.27965</td>
<td>13.61206</td>
<td>14.16176</td>
<td>15.19981</td>
<td>16.57289</td>
<td>18.25533</td>
<td>20.13464</td>
<td>21.48207</td>
<td>22.4705</td>
</tr>
<tr>
<th scope="row">53.5</th>
<td>13.40907</td>
<td>13.74566</td>
<td>14.30257</td>
<td>15.35527</td>
<td>16.74994</td>
<td>18.46249</td>
<td>20.38048</td>
<td>21.7591</td>
<td>22.77232</td>
</tr>
<tr>
<th scope="row">54.5</th>
<td>13.53962</td>
<td>13.8804</td>
<td>14.44453</td>
<td>15.51193</td>
<td>16.92827</td>
<td>18.67105</td>
<td>20.62795</td>
<td>22.03803</td>
<td>23.07631</td>
</tr>
<tr>
<th scope="row">55.5</th>
<td>13.67121</td>
<td>14.01621</td>
<td>14.5876</td>
<td>15.66975</td>
<td>17.10783</td>
<td>18.88097</td>
<td>20.87704</td>
<td>22.31884</td>
<td>23.38243</td>
</tr>
<tr>
<th scope="row">56.5</th>
<td>13.80381</td>
<td>14.15303</td>
<td>14.73172</td>
<td>15.82868</td>
<td>17.28859</td>
<td>19.09224</td>
<td>21.1277</td>
<td>22.60148</td>
<td>23.69063</td>
</tr>
<tr>
<th scope="row">57.5</th>
<td>13.93732</td>
<td>14.29081</td>
<td>14.87683</td>
<td>15.98868</td>
<td>17.47052</td>
<td>19.30483</td>
<td>21.37993</td>
<td>22.88594</td>
<td>24.0009</td>
</tr>
<tr>
<th scope="row">58.5</th>
<td>14.0717</td>
<td>14.42947</td>
<td>15.02287</td>
<td>16.14971</td>
<td>17.65361</td>
<td>19.51874</td>
<td>21.63373</td>
<td>23.17222</td>
<td>24.31322</td>
</tr>
<tr>
<th scope="row">59.5</th>
<td>14.20687</td>
<td>14.56897</td>
<td>15.16981</td>
<td>16.31173</td>
<td>17.83782</td>
<td>19.73395</td>
<td>21.88909</td>
<td>23.46031</td>
<td>24.62758</td>
</tr>
<tr>
<th scope="row">60.5</th>
<td>14.34277</td>
<td>14.70924</td>
<td>15.31758</td>
<td>16.47471</td>
<td>18.02314</td>
<td>19.95048</td>
<td>22.14604</td>
<td>23.75024</td>
<td>24.94401</td>
</tr>
<tr>
<th scope="row">61.5</th>
<td>14.47934</td>
<td>14.85022</td>
<td>15.46614</td>
<td>16.63861</td>
<td>18.20956</td>
<td>20.16834</td>
<td>22.4046</td>
<td>24.04202</td>
<td>25.26252</td>
</tr>
<tr>
<th scope="row">62.5</th>
<td>14.61652</td>
<td>14.99186</td>
<td>15.61545</td>
<td>16.80342</td>
<td>18.39709</td>
<td>20.38753</td>
<td>22.6648</td>
<td>24.3357</td>
<td>25.58315</td>
</tr>
<tr>
<th scope="row">63.5</th>
<td>14.75426</td>
<td>15.13412</td>
<td>15.76547</td>
<td>16.9691</td>
<td>18.58571</td>
<td>20.6081</td>
<td>22.92668</td>
<td>24.63133</td>
<td>25.90595</td>
</tr>
<tr>
<th scope="row">64.5</th>
<td>14.8925</td>
<td>15.27694</td>
<td>15.91616</td>
<td>17.13565</td>
<td>18.77545</td>
<td>20.83007</td>
<td>23.19031</td>
<td>24.92897</td>
<td>26.23096</td>
</tr>
<tr>
<th scope="row">65.5</th>
<td>15.03119</td>
<td>15.42029</td>
<td>16.06749</td>
<td>17.30305</td>
<td>18.96631</td>
<td>21.05349</td>
<td>23.45574</td>
<td>25.22868</td>
<td>26.55827</td>
</tr>
<tr>
<th scope="row">66.5</th>
<td>15.1703</td>
<td>15.56413</td>
<td>16.21943</td>
<td>17.4713</td>
<td>19.15831</td>
<td>21.2784</td>
<td>23.72305</td>
<td>25.53055</td>
<td>26.88796</td>
</tr>
<tr>
<th scope="row">67.5</th>
<td>15.30978</td>
<td>15.70843</td>
<td>16.37197</td>
<td>17.6404</td>
<td>19.35149</td>
<td>21.50486</td>
<td>23.99232</td>
<td>25.83467</td>
<td>27.2201</td>
</tr>
<tr>
<th scope="row">68.5</th>
<td>15.44961</td>
<td>15.85316</td>
<td>16.52509</td>
<td>17.81035</td>
<td>19.54588</td>
<td>21.73294</td>
<td>24.26364</td>
<td>26.14113</td>
<td>27.55481</td>
</tr>
<tr>
<th scope="row">69.5</th>
<td>15.58975</td>
<td>15.99831</td>
<td>16.67878</td>
<td>17.98118</td>
<td>19.74151</td>
<td>21.96271</td>
<td>24.5371</td>
<td>26.45005</td>
<td>27.8922</td>
</tr>
<tr>
<th scope="row">70.5</th>
<td>15.73018</td>
<td>16.14385</td>
<td>16.83304</td>
<td>18.15288</td>
<td>19.93843</td>
<td>22.19425</td>
<td>24.81282</td>
<td>26.76154</td>
<td>28.23237</td>
</tr>
<tr>
<th scope="row">71.5</th>
<td>15.87089</td>
<td>16.28977</td>
<td>16.98787</td>
<td>18.32549</td>
<td>20.1367</td>
<td>22.42763</td>
<td>25.09089</td>
<td>27.07573</td>
<td>28.57547</td>
</tr>
<tr>
<th scope="row">72.5</th>
<td>16.01186</td>
<td>16.43608</td>
<td>17.14327</td>
<td>18.49904</td>
<td>20.33636</td>
<td>22.66294</td>
<td>25.37145</td>
<td>27.39274</td>
<td>28.92162</td>
</tr>
<tr>
<th scope="row">73.5</th>
<td>16.1531</td>
<td>16.58277</td>
<td>17.29926</td>
<td>18.67356</td>
<td>20.53748</td>
<td>22.90029</td>
<td>25.65461</td>
<td>27.71272</td>
<td>29.27096</td>
</tr>
<tr>
<th scope="row">74.5</th>
<td>16.2946</td>
<td>16.72986</td>
<td>17.45586</td>
<td>18.84908</td>
<td>20.74013</td>
<td>23.13976</td>
<td>25.94051</td>
<td>28.0358</td>
<td>29.62364</td>
</tr>
<tr>
<th scope="row">75.5</th>
<td>16.43638</td>
<td>16.87736</td>
<td>17.61309</td>
<td>19.02566</td>
<td>20.94438</td>
<td>23.38146</td>
<td>26.22926</td>
<td>28.36213</td>
<td>29.97981</td>
</tr>
<tr>
<th scope="row">76.5</th>
<td>16.57843</td>
<td>17.02528</td>
<td>17.77097</td>
<td>19.20334</td>
<td>21.1503</td>
<td>23.6255</td>
<td>26.52102</td>
<td>28.69185</td>
<td>30.33962</td>
</tr>
<tr>
<th scope="row">77.5</th>
<td>16.7208</td>
<td>17.17365</td>
<td>17.92956</td>
<td>19.38217</td>
<td>21.35797</td>
<td>23.87199</td>
<td>26.81591</td>
<td>29.02513</td>
<td>30.70323</td>
</tr>
<tr>
<th scope="row">78.5</th>
<td>16.86349</td>
<td>17.3225</td>
<td>18.08887</td>
<td>19.56221</td>
<td>21.56748</td>
<td>24.12103</td>
<td>27.11407</td>
<td>29.36212</td>
<td>31.0708</td>
</tr>
<tr>
<th scope="row">79.5</th>
<td>17.00654</td>
<td>17.47187</td>
<td>18.24897</td>
<td>19.74353</td>
<td>21.77891</td>
<td>24.37274</td>
<td>27.41566</td>
<td>29.70296</td>
<td>31.44249</td>
</tr>
<tr>
<th scope="row">80.5</th>
<td>17.14998</td>
<td>17.6218</td>
<td>18.40989</td>
<td>19.9262</td>
<td>21.99235</td>
<td>24.62725</td>
<td>27.7208</td>
<td>30.04782</td>
<td>31.81846</td>
</tr>
<tr>
<th scope="row">81.5</th>
<td>17.29386</td>
<td>17.77232</td>
<td>18.5717</td>
<td>20.11027</td>
<td>22.20789</td>
<td>24.88466</td>
<td>28.02965</td>
<td>30.39685</td>
<td>32.19887</td>
</tr>
<tr>
<th scope="row">82.5</th>
<td>17.43821</td>
<td>17.9235</td>
<td>18.73445</td>
<td>20.29582</td>
<td>22.42562</td>
<td>25.14509</td>
<td>28.34233</td>
<td>30.75021</td>
<td>32.58389</td>
</tr>
<tr>
<th scope="row">83.5</th>
<td>17.5831</td>
<td>18.07539</td>
<td>18.89819</td>
<td>20.48293</td>
<td>22.64564</td>
<td>25.40866</td>
<td>28.659</td>
<td>31.10804</td>
<td>32.97366</td>
</tr>
<tr>
<th scope="row">84.5</th>
<td>17.72858</td>
<td>18.22805</td>
<td>19.063</td>
<td>20.67168</td>
<td>22.86804</td>
<td>25.67549</td>
<td>28.97979</td>
<td>31.47049</td>
<td>33.36833</td>
</tr>
<tr>
<th scope="row">85.5</th>
<td>17.8747</td>
<td>18.38153</td>
<td>19.22895</td>
<td>20.86215</td>
<td>23.09293</td>
<td>25.94569</td>
<td>29.30484</td>
<td>31.83771</td>
<td>33.76807</td>
</tr>
<tr>
<th scope="row">86.5</th>
<td>18.02152</td>
<td>18.53591</td>
<td>19.3961</td>
<td>21.05441</td>
<td>23.32039</td>
<td>26.21937</td>
<td>29.63426</td>
<td>32.20984</td>
<td>34.17302</td>
</tr>
<tr>
<th scope="row">87.5</th>
<td>18.16912</td>
<td>18.69124</td>
<td>19.56453</td>
<td>21.24855</td>
<td>23.55052</td>
<td>26.49666</td>
<td>29.9682</td>
<td>32.58701</td>
<td>34.5833</td>
</tr>
<tr>
<th scope="row">88.5</th>
<td>18.31757</td>
<td>18.84762</td>
<td>19.73432</td>
<td>21.44467</td>
<td>23.78342</td>
<td>26.77764</td>
<td>30.30677</td>
<td>32.96935</td>
<td>34.99906</td>
</tr>
<tr>
<th scope="row">89.5</th>
<td>18.46693</td>
<td>19.00511</td>
<td>19.90554</td>
<td>21.64283</td>
<td>24.01918</td>
<td>27.06244</td>
<td>30.65008</td>
<td>33.35698</td>
<td>35.42042</td>
</tr>
<tr>
<th scope="row">90.5</th>
<td>18.61729</td>
<td>19.16378</td>
<td>20.07828</td>
<td>21.84313</td>
<td>24.25789</td>
<td>27.35114</td>
<td>30.99825</td>
<td>33.75001</td>
<td>35.8475</td>
</tr>
<tr>
<th scope="row">91.5</th>
<td>18.76871</td>
<td>19.32373</td>
<td>20.25261</td>
<td>22.04564</td>
<td>24.49965</td>
<td>27.64385</td>
<td>31.35137</td>
<td>34.14856</td>
<td>36.2804</td>
</tr>
<tr>
<th scope="row">92.5</th>
<td>18.92129</td>
<td>19.48502</td>
<td>20.42863</td>
<td>22.25047</td>
<td>24.74454</td>
<td>27.94066</td>
<td>31.70954</td>
<td>34.55271</td>
<td>36.71922</td>
</tr>
<tr>
<th scope="row">93.5</th>
<td>19.07511</td>
<td>19.64775</td>
<td>20.6064</td>
<td>22.45768</td>
<td>24.99264</td>
<td>28.24165</td>
<td>32.07286</td>
<td>34.96256</td>
<td>37.16406</td>
</tr>
<tr>
<th scope="row">94.5</th>
<td>19.23024</td>
<td>19.81199</td>
<td>20.78601</td>
<td>22.66736</td>
<td>25.24403</td>
<td>28.54689</td>
<td>32.44138</td>
<td>35.37818</td>
<td>37.61498</td>
</tr>
<tr>
<th scope="row">95.5</th>
<td>19.38678</td>
<td>19.97783</td>
<td>20.96755</td>
<td>22.8796</td>
<td>25.4988</td>
<td>28.85648</td>
<td>32.8152</td>
<td>35.79964</td>
<td>38.07207</td>
</tr>
<tr>
<th scope="row">96.5</th>
<td>19.54481</td>
<td>20.14535</td>
<td>21.15111</td>
<td>23.09446</td>
<td>25.75702</td>
<td>29.17046</td>
<td>33.19435</td>
<td>36.22699</td>
<td>38.53537</td>
</tr>
<tr>
<th scope="row">97.5</th>
<td>19.70442</td>
<td>20.31464</td>
<td>21.33675</td>
<td>23.31203</td>
<td>26.01874</td>
<td>29.4889</td>
<td>33.5789</td>
<td>36.66029</td>
<td>39.00492</td>
</tr>
<tr>
<th scope="row">98.5</th>
<td>19.86568</td>
<td>20.48579</td>
<td>21.52456</td>
<td>23.53237</td>
<td>26.28404</td>
<td>29.81185</td>
<td>33.96887</td>
<td>37.09956</td>
<td>39.48077</td>
</tr>
<tr>
<th scope="row">99.5</th>
<td>20.0287</td>
<td>20.65887</td>
<td>21.71462</td>
<td>23.75556</td>
<td>26.55298</td>
<td>30.13934</td>
<td>34.36431</td>
<td>37.54482</td>
<td>39.96292</td>
</tr>
<tr>
<th scope="row">100.5</th>
<td>20.19355</td>
<td>20.83397</td>
<td>21.907</td>
<td>23.98166</td>
<td>26.82559</td>
<td>30.47142</td>
<td>34.76522</td>
<td>37.99609</td>
<td>40.45138</td>
</tr>
<tr>
<th scope="row">101.5</th>
<td>20.36032</td>
<td>21.01117</td>
<td>22.10179</td>
<td>24.21073</td>
<td>27.10193</td>
<td>30.80811</td>
<td>35.17161</td>
<td>38.45335</td>
<td>40.94614</td>
</tr>
<tr>
<th scope="row">102.5</th>
<td>20.5291</td>
<td>21.19055</td>
<td>22.29905</td>
<td>24.44283</td>
<td>27.38203</td>
<td>31.14942</td>
<td>35.58347</td>
<td>38.91658</td>
<td>41.44718</td>
</tr>
<tr>
<th scope="row">103.5</th>
<td>20.69997</td>
<td>21.37219</td>
<td>22.49884</td>
<td>24.67802</td>
<td>27.66593</td>
<td>31.49536</td>
<td>36.00078</td>
<td>39.38577</td>
<td>41.95447</td>
</tr>
<tr>
<th scope="row">104.5</th>
<td>20.873</td>
<td>21.55616</td>
<td>22.70125</td>
<td>24.91634</td>
<td>27.95365</td>
<td>31.84592</td>
<td>36.42352</td>
<td>39.86086</td>
<td>42.46794</td>
</tr>
<tr>
<th scope="row">105.5</th>
<td>21.04828</td>
<td>21.74253</td>
<td>22.90633</td>
<td>25.15783</td>
<td>28.24521</td>
<td>32.20108</td>
<td>36.85164</td>
<td>40.34179</td>
<td>42.98755</td>
</tr>
<tr>
<th scope="row">106.5</th>
<td>21.22589</td>
<td>21.93138</td>
<td>23.11413</td>
<td>25.40252</td>
<td>28.5406</td>
<td>32.56084</td>
<td>37.28507</td>
<td>40.82849</td>
<td>43.5132</td>
</tr>
<tr>
<th scope="row">107.5</th>
<td>21.40589</td>
<td>22.12277</td>
<td>23.32471</td>
<td>25.65046</td>
<td>28.83984</td>
<td>32.92513</td>
<td>37.72376</td>
<td>41.32088</td>
<td>44.0448</td>
</tr>
<tr>
<th scope="row">108.5</th>
<td>21.58837</td>
<td>22.31677</td>
<td>23.53813</td>
<td>25.90167</td>
<td>29.14291</td>
<td>33.29393</td>
<td>38.16762</td>
<td>41.81885</td>
<td>44.58226</td>
</tr>
<tr>
<th scope="row">109.5</th>
<td>21.77338</td>
<td>22.51343</td>
<td>23.75442</td>
<td>26.15616</td>
<td>29.4498</td>
<td>33.66717</td>
<td>38.61656</td>
<td>42.32229</td>
<td>45.12543</td>
</tr>
<tr>
<th scope="row">110.5</th>
<td>21.96099</td>
<td>22.71282</td>
<td>23.97364</td>
<td>26.41394</td>
<td>29.76048</td>
<td>34.04479</td>
<td>39.07046</td>
<td>42.83107</td>
<td>45.67419</td>
</tr>
<tr>
<th scope="row">111.5</th>
<td>22.15126</td>
<td>22.91497</td>
<td>24.19581</td>
<td>26.67503</td>
<td>30.07493</td>
<td>34.4267</td>
<td>39.52921</td>
<td>43.34505</td>
<td>46.22839</td>
</tr>
<tr>
<th scope="row">112.5</th>
<td>22.34426</td>
<td>23.11994</td>
<td>24.42096</td>
<td>26.93942</td>
<td>30.39308</td>
<td>34.81282</td>
<td>39.99268</td>
<td>43.86408</td>
<td>46.78786</td>
</tr>
<tr>
<th scope="row">113.5</th>
<td>22.54002</td>
<td>23.32778</td>
<td>24.64912</td>
<td>27.20709</td>
<td>30.7149</td>
<td>35.20305</td>
<td>40.46071</td>
<td>44.38798</td>
<td>47.35242</td>
</tr>
<tr>
<th scope="row">114.5</th>
<td>22.73861</td>
<td>23.53851</td>
<td>24.88031</td>
<td>27.47805</td>
<td>31.04032</td>
<td>35.59726</td>
<td>40.93316</td>
<td>44.91658</td>
<td>47.92187</td>
</tr>
<tr>
<th scope="row">115.5</th>
<td>22.94006</td>
<td>23.75217</td>
<td>25.11454</td>
<td>27.75225</td>
<td>31.36928</td>
<td>35.99535</td>
<td>41.40984</td>
<td>45.44968</td>
<td>48.49603</td>
</tr>
<tr>
<th scope="row">116.5</th>
<td>23.14441</td>
<td>23.96879</td>
<td>25.35181</td>
<td>28.02968</td>
<td>31.70168</td>
<td>36.39717</td>
<td>41.89057</td>
<td>45.98708</td>
<td>49.07465</td>
</tr>
<tr>
<th scope="row">117.5</th>
<td>23.3517</td>
<td>24.18838</td>
<td>25.59214</td>
<td>28.31029</td>
<td>32.03745</td>
<td>36.80259</td>
<td>42.37517</td>
<td>46.52854</td>
<td>49.65753</td>
</tr>
<tr>
<th scope="row">118.5</th>
<td>23.56195</td>
<td>24.41097</td>
<td>25.83551</td>
<td>28.59403</td>
<td>32.37649</td>
<td>37.21144</td>
<td>42.86342</td>
<td>47.07385</td>
<td>50.2444</td>
</tr>
<tr>
<th scope="row">119.5</th>
<td>23.77519</td>
<td>24.63656</td>
<td>26.08191</td>
<td>28.88087</td>
<td>32.71868</td>
<td>37.62356</td>
<td>43.35511</td>
<td>47.62276</td>
<td>50.83502</td>
</tr>
<tr>
<th scope="row">120.5</th>
<td>23.99143</td>
<td>24.86516</td>
<td>26.33132</td>
<td>29.17072</td>
<td>33.06392</td>
<td>38.03878</td>
<td>43.85001</td>
<td>48.17501</td>
<td>51.42913</td>
</tr>
<tr>
<th scope="row">121.5</th>
<td>24.21068</td>
<td>25.09677</td>
<td>26.58372</td>
<td>29.46353</td>
<td>33.41208</td>
<td>38.45691</td>
<td>44.34788</td>
<td>48.73033</td>
<td>52.02644</td>
</tr>
<tr>
<th scope="row">122.5</th>
<td>24.43296</td>
<td>25.33137</td>
<td>26.83907</td>
<td>29.75922</td>
<td>33.76303</td>
<td>38.87775</td>
<td>44.84847</td>
<td>49.28846</td>
<td>52.62666</td>
</tr>
<tr>
<th scope="row">123.5</th>
<td>24.65826</td>
<td>25.56895</td>
<td>27.09734</td>
<td>30.0577</td>
<td>34.11663</td>
<td>39.30111</td>
<td>45.35152</td>
<td>49.84911</td>
<td>53.22951</td>
</tr>
<tr>
<th scope="row">124.5</th>
<td>24.88657</td>
<td>25.80949</td>
<td>27.35848</td>
<td>30.35888</td>
<td>34.47272</td>
<td>39.72676</td>
<td>45.85676</td>
<td>50.41198</td>
<td>53.83467</td>
</tr>
<tr>
<th scope="row">125.5</th>
<td>25.11788</td>
<td>26.05297</td>
<td>27.62244</td>
<td>30.66267</td>
<td>34.83116</td>
<td>40.15449</td>
<td>46.36392</td>
<td>50.97677</td>
<td>54.44183</td>
</tr>
<tr>
<th scope="row">126.5</th>
<td>25.35217</td>
<td>26.29934</td>
<td>27.88915</td>
<td>30.96895</td>
<td>35.19176</td>
<td>40.58407</td>
<td>46.87271</td>
<td>51.54317</td>
<td>55.05067</td>
</tr>
<tr>
<th scope="row">127.5</th>
<td>25.58941</td>
<td>26.54856</td>
<td>28.15856</td>
<td>31.27762</td>
<td>35.55437</td>
<td>41.01526</td>
<td>47.38283</td>
<td>52.11086</td>
<td>55.66086</td>
</tr>
<tr>
<th scope="row">128.5</th>
<td>25.82958</td>
<td>26.8006</td>
<td>28.43059</td>
<td>31.58856</td>
<td>35.9188</td>
<td>41.44782</td>
<td>47.894</td>
<td>52.67951</td>
<td>56.27207</td>
</tr>
<tr>
<th scope="row">129.5</th>
<td>26.07263</td>
<td>27.05539</td>
<td>28.70516</td>
<td>31.90163</td>
<td>36.28486</td>
<td>41.88148</td>
<td>48.40589</td>
<td>53.2488</td>
<td>56.88395</td>
</tr>
<tr>
<th scope="row">130.5</th>
<td>26.31852</td>
<td>27.31287</td>
<td>28.98218</td>
<td>32.21671</td>
<td>36.65236</td>
<td>42.316</td>
<td>48.9182</td>
<td>53.81837</td>
<td>57.49615</td>
</tr>
<tr>
<th scope="row">131.5</th>
<td>26.56719</td>
<td>27.57298</td>
<td>29.26156</td>
<td>32.53364</td>
<td>37.02111</td>
<td>42.75111</td>
<td>49.43061</td>
<td>54.3879</td>
<td>58.10833</td>
</tr>
<tr>
<th scope="row">132.5</th>
<td>26.81859</td>
<td>27.83564</td>
<td>29.54321</td>
<td>32.8523</td>
<td>37.39089</td>
<td>43.18655</td>
<td>49.9428</td>
<td>54.95703</td>
<td>58.72013</td>
</tr>
<tr>
<th scope="row">133.5</th>
<td>27.07265</td>
<td>28.10077</td>
<td>29.827</td>
<td>33.17252</td>
<td>37.76149</td>
<td>43.62203</td>
<td>50.45443</td>
<td>55.52542</td>
<td>59.33118</td>
</tr>
<tr>
<th scope="row">134.5</th>
<td>27.3293</td>
<td>28.36829</td>
<td>30.11285</td>
<td>33.49415</td>
<td>38.1327</td>
<td>44.05728</td>
<td>50.96519</td>
<td>56.09271</td>
<td>59.94114</td>
</tr>
<tr>
<th scope="row">135.5</th>
<td>27.58846</td>
<td>28.63809</td>
<td>30.40062</td>
<td>33.81701</td>
<td>38.5043</td>
<td>44.49201</td>
<td>51.47473</td>
<td>56.65855</td>
<td>60.54964</td>
</tr>
<tr>
<th scope="row">136.5</th>
<td>27.85004</td>
<td>28.91009</td>
<td>30.69019</td>
<td>34.14096</td>
<td>38.87605</td>
<td>44.92595</td>
<td>51.98272</td>
<td>57.22257</td>
<td>61.15631</td>
</tr>
<tr>
<th scope="row">137.5</th>
<td>28.11395</td>
<td>29.18417</td>
<td>30.98143</td>
<td>34.4658</td>
<td>39.24775</td>
<td>45.3588</td>
<td>52.48882</td>
<td>57.78443</td>
<td>61.7608</td>
</tr>
<tr>
<th scope="row">138.5</th>
<td>28.38009</td>
<td>29.46022</td>
<td>31.27421</td>
<td>34.79137</td>
<td>39.61914</td>
<td>45.79028</td>
<td>52.9927</td>
<td>58.34376</td>
<td>62.36274</td>
</tr>
<tr>
<th scope="row">139.5</th>
<td>28.64837</td>
<td>29.73813</td>
<td>31.56838</td>
<td>35.11747</td>
<td>39.99</td>
<td>46.22009</td>
<td>53.49402</td>
<td>58.90022</td>
<td>62.96178</td>
</tr>
<tr>
<th scope="row">140.5</th>
<td>28.91866</td>
<td>30.01776</td>
<td>31.86381</td>
<td>35.44394</td>
<td>40.36009</td>
<td>46.64794</td>
<td>53.99244</td>
<td>59.45344</td>
<td>63.55756</td>
</tr>
<tr>
<th scope="row">141.5</th>
<td>29.19086</td>
<td>30.299</td>
<td>32.16034</td>
<td>35.77056</td>
<td>40.72918</td>
<td>47.07354</td>
<td>54.48762</td>
<td>60.00308</td>
<td>64.14972</td>
</tr>
<tr>
<th scope="row">142.5</th>
<td>29.46484</td>
<td>30.5817</td>
<td>32.45781</td>
<td>36.09716</td>
<td>41.09701</td>
<td>47.49661</td>
<td>54.97925</td>
<td>60.54878</td>
<td>64.73791</td>
</tr>
<tr>
<th scope="row">143.5</th>
<td>29.74046</td>
<td>30.86573</td>
<td>32.75608</td>
<td>36.42354</td>
<td>41.46336</td>
<td>47.91684</td>
<td>55.46697</td>
<td>61.0902</td>
<td>65.32179</td>
</tr>
<tr>
<th scope="row">144.5</th>
<td>30.0176</td>
<td>31.15094</td>
<td>33.05496</td>
<td>36.7495</td>
<td>41.82798</td>
<td>48.33396</td>
<td>55.95048</td>
<td>61.62701</td>
<td>65.90103</td>
</tr>
<tr>
<th scope="row">145.5</th>
<td>30.29612</td>
<td>31.43718</td>
<td>33.3543</td>
<td>37.07485</td>
<td>42.19063</td>
<td>48.74767</td>
<td>56.42944</td>
<td>62.15887</td>
<td>66.47528</td>
</tr>
<tr>
<th scope="row">146.5</th>
<td>30.57588</td>
<td>31.7243</td>
<td>33.65394</td>
<td>37.39937</td>
<td>42.55108</td>
<td>49.15771</td>
<td>56.90354</td>
<td>62.68544</td>
<td>67.04422</td>
</tr>
<tr>
<th scope="row">147.5</th>
<td>30.85671</td>
<td>32.01214</td>
<td>33.95368</td>
<td>37.72288</td>
<td>42.90909</td>
<td>49.56378</td>
<td>57.37247</td>
<td>63.20642</td>
<td>67.60754</td>
</tr>
<tr>
<th scope="row">148.5</th>
<td>31.13848</td>
<td>32.30053</td>
<td>34.25336</td>
<td>38.04517</td>
<td>43.26442</td>
<td>49.96562</td>
<td>57.83593</td>
<td>63.72148</td>
<td>68.16491</td>
</tr>
<tr>
<th scope="row">149.5</th>
<td>31.42101</td>
<td>32.58932</td>
<td>34.55281</td>
<td>38.36604</td>
<td>43.61683</td>
<td>50.36297</td>
<td>58.29361</td>
<td>64.23032</td>
<td>68.71605</td>
</tr>
<tr>
<th scope="row">150.5</th>
<td>31.70415</td>
<td>32.87832</td>
<td>34.85183</td>
<td>38.68529</td>
<td>43.96612</td>
<td>50.75555</td>
<td>58.74524</td>
<td>64.73264</td>
<td>69.26067</td>
</tr>
<tr>
<th scope="row">151.5</th>
<td>31.98774</td>
<td>33.16738</td>
<td>35.15025</td>
<td>39.00272</td>
<td>44.31204</td>
<td>51.14313</td>
<td>59.19053</td>
<td>65.22816</td>
<td>69.79847</td>
</tr>
<tr>
<th scope="row">152.5</th>
<td>32.27159</td>
<td>33.4563</td>
<td>35.44789</td>
<td>39.31812</td>
<td>44.65437</td>
<td>51.52544</td>
<td>59.62921</td>
<td>65.71661</td>
<td>70.32919</td>
</tr>
<tr>
<th scope="row">153.5</th>
<td>32.55554</td>
<td>33.74492</td>
<td>35.74455</td>
<td>39.63131</td>
<td>44.99291</td>
<td>51.90225</td>
<td>60.06103</td>
<td>66.19771</td>
<td>70.85258</td>
</tr>
<tr>
<th scope="row">154.5</th>
<td>32.8394</td>
<td>34.03306</td>
<td>36.04006</td>
<td>39.94209</td>
<td>45.32745</td>
<td>52.27334</td>
<td>60.48572</td>
<td>66.67121</td>
<td>71.36839</td>
</tr>
<tr>
<th scope="row">155.5</th>
<td>33.12301</td>
<td>34.32053</td>
<td>36.33424</td>
<td>40.25026</td>
<td>45.65777</td>
<td>52.63847</td>
<td>60.90306</td>
<td>67.13688</td>
<td>71.87638</td>
</tr>
<tr>
<th scope="row">156.5</th>
<td>33.40617</td>
<td>34.60715</td>
<td>36.62688</td>
<td>40.55564</td>
<td>45.98369</td>
<td>52.99745</td>
<td>61.31281</td>
<td>67.59448</td>
<td>72.37633</td>
</tr>
<tr>
<th scope="row">157.5</th>
<td>33.6887</td>
<td>34.89274</td>
<td>36.91782</td>
<td>40.85805</td>
<td>46.30501</td>
<td>53.35007</td>
<td>61.71477</td>
<td>68.04379</td>
<td>72.86804</td>
</tr>
<tr>
<th scope="row">158.5</th>
<td>33.97042</td>
<td>35.17711</td>
<td>37.20687</td>
<td>41.15729</td>
<td>46.62155</td>
<td>53.69614</td>
<td>62.10874</td>
<td>68.48463</td>
<td>73.35131</td>
</tr>
<tr>
<th scope="row">159.5</th>
<td>34.25114</td>
<td>35.46007</td>
<td>37.49385</td>
<td>41.45321</td>
<td>46.93314</td>
<td>54.03549</td>
<td>62.49452</td>
<td>68.91679</td>
<td>73.82597</td>
</tr>
<tr>
<th scope="row">160.5</th>
<td>34.53066</td>
<td>35.74145</td>
<td>37.77858</td>
<td>41.74562</td>
<td>47.23962</td>
<td>54.36794</td>
<td>62.87195</td>
<td>69.34011</td>
<td>74.29185</td>
</tr>
<tr>
<th scope="row">161.5</th>
<td>34.80881</td>
<td>36.02105</td>
<td>38.06087</td>
<td>42.03435</td>
<td>47.54083</td>
<td>54.69335</td>
<td>63.24088</td>
<td>69.75442</td>
<td>74.7488</td>
</tr>
<tr>
<th scope="row">162.5</th>
<td>35.08539</td>
<td>36.2987</td>
<td>38.34057</td>
<td>42.31926</td>
<td>47.83661</td>
<td>55.01159</td>
<td>63.60115</td>
<td>70.1596</td>
<td>75.19669</td>
</tr>
<tr>
<th scope="row">163.5</th>
<td>35.36022</td>
<td>36.57421</td>
<td>38.61748</td>
<td>42.60018</td>
<td>48.12685</td>
<td>55.32252</td>
<td>63.95264</td>
<td>70.5555</td>
<td>75.6354</td>
</tr>
<tr>
<th scope="row">164.5</th>
<td>35.63309</td>
<td>36.84739</td>
<td>38.89145</td>
<td>42.87697</td>
<td>48.41141</td>
<td>55.62603</td>
<td>64.29525</td>
<td>70.94203</td>
<td>76.06483</td>
</tr>
<tr>
<th scope="row">165.5</th>
<td>35.90384</td>
<td>37.11808</td>
<td>39.16232</td>
<td>43.14949</td>
<td>48.69018</td>
<td>55.92203</td>
<td>64.62889</td>
<td>71.31908</td>
<td>76.48488</td>
</tr>
<tr>
<th scope="row">166.5</th>
<td>36.17227</td>
<td>37.3861</td>
<td>39.42991</td>
<td>43.4176</td>
<td>48.96305</td>
<td>56.21044</td>
<td>64.95347</td>
<td>71.68659</td>
<td>76.89549</td>
</tr>
<tr>
<th scope="row">167.5</th>
<td>36.4382</td>
<td>37.65127</td>
<td>39.69408</td>
<td>43.68119</td>
<td>49.22993</td>
<td>56.49119</td>
<td>65.26895</td>
<td>72.04449</td>
<td>77.2966</td>
</tr>
<tr>
<th scope="row">168.5</th>
<td>36.70144</td>
<td>37.91342</td>
<td>39.95467</td>
<td>43.94012</td>
<td>49.49075</td>
<td>56.76423</td>
<td>65.57527</td>
<td>72.39275</td>
<td>77.68817</td>
</tr>
<tr>
<th scope="row">169.5</th>
<td>36.96182</td>
<td>38.17238</td>
<td>40.21154</td>
<td>44.1943</td>
<td>49.74544</td>
<td>57.02954</td>
<td>65.87243</td>
<td>72.73133</td>
<td>78.07017</td>
</tr>
<tr>
<th scope="row">170.5</th>
<td>37.21916</td>
<td>38.428</td>
<td>40.46454</td>
<td>44.44363</td>
<td>49.99394</td>
<td>57.28708</td>
<td>66.16042</td>
<td>73.06023</td>
<td>78.44259</td>
</tr>
<tr>
<th scope="row">171.5</th>
<td>37.4733</td>
<td>38.68012</td>
<td>40.71356</td>
<td>44.688</td>
<td>50.23621</td>
<td>57.53687</td>
<td>66.43925</td>
<td>73.37946</td>
<td>78.80544</td>
</tr>
<tr>
<th scope="row">172.5</th>
<td>37.72405</td>
<td>38.92858</td>
<td>40.95845</td>
<td>44.92735</td>
<td>50.47222</td>
<td>57.77893</td>
<td>66.70897</td>
<td>73.68906</td>
<td>79.15873</td>
</tr>
<tr>
<th scope="row">173.5</th>
<td>37.97127</td>
<td>39.17324</td>
<td>41.19909</td>
<td>45.1616</td>
<td>50.70196</td>
<td>58.01327</td>
<td>66.96961</td>
<td>73.98906</td>
<td>79.50251</td>
</tr>
<tr>
<th scope="row">174.5</th>
<td>38.21478</td>
<td>39.41396</td>
<td>41.43538</td>
<td>45.39069</td>
<td>50.92541</td>
<td>58.23994</td>
<td>67.22127</td>
<td>74.27953</td>
<td>79.83682</td>
</tr>
<tr>
<th scope="row">175.5</th>
<td>38.45445</td>
<td>39.6506</td>
<td>41.66721</td>
<td>45.61455</td>
<td>51.14259</td>
<td>58.45903</td>
<td>67.46402</td>
<td>74.56056</td>
<td>80.16173</td>
</tr>
<tr>
<th scope="row">176.5</th>
<td>38.69012</td>
<td>39.88303</td>
<td>41.89448</td>
<td>45.83316</td>
<td>51.35353</td>
<td>58.67061</td>
<td>67.69798</td>
<td>74.83223</td>
<td>80.4773</td>
</tr>
<tr>
<th scope="row">177.5</th>
<td>38.92165</td>
<td>40.11114</td>
<td>42.1171</td>
<td>46.04647</td>
<td>51.55825</td>
<td>58.87477</td>
<td>67.92327</td>
<td>75.09468</td>
<td>80.78364</td>
</tr>
<tr>
<th scope="row">178.5</th>
<td>39.14891</td>
<td>40.3348</td>
<td>42.33498</td>
<td>46.25446</td>
<td>51.75681</td>
<td>59.07164</td>
<td>68.14006</td>
<td>75.34802</td>
<td>81.08083</td>
</tr>
<tr>
<th scope="row">179.5</th>
<td>39.37177</td>
<td>40.55392</td>
<td>42.54806</td>
<td>46.45712</td>
<td>51.94926</td>
<td>59.26135</td>
<td>68.3485</td>
<td>75.59243</td>
<td>81.36901</td>
</tr>
<tr>
<th scope="row">180.5</th>
<td>39.59012</td>
<td>40.76839</td>
<td>42.75627</td>
<td>46.65445</td>
<td>52.13568</td>
<td>59.44404</td>
<td>68.54877</td>
<td>75.82805</td>
<td>81.6483</td>
</tr>
<tr>
<th scope="row">181.5</th>
<td>39.80385</td>
<td>40.97812</td>
<td>42.95955</td>
<td>46.84646</td>
<td>52.31616</td>
<td>59.61988</td>
<td>68.74109</td>
<td>76.05507</td>
<td>81.91883</td>
</tr>
<tr>
<th scope="row">182.5</th>
<td>40.01284</td>
<td>41.18304</td>
<td>43.15786</td>
<td>47.03316</td>
<td>52.4908</td>
<td>59.78905</td>
<td>68.92566</td>
<td>76.2737</td>
<td>82.18076</td>
</tr>
<tr>
<th scope="row">183.5</th>
<td>40.21702</td>
<td>41.38308</td>
<td>43.35116</td>
<td>47.21458</td>
<td>52.6597</td>
<td>59.95173</td>
<td>69.10273</td>
<td>76.48415</td>
<td>82.43425</td>
</tr>
<tr>
<th scope="row">184.5</th>
<td>40.4163</td>
<td>41.57816</td>
<td>43.53942</td>
<td>47.39077</td>
<td>52.82299</td>
<td>60.10814</td>
<td>69.27255</td>
<td>76.68664</td>
<td>82.67946</td>
</tr>
<tr>
<th scope="row">185.5</th>
<td>40.6106</td>
<td>41.76824</td>
<td>43.72263</td>
<td>47.56176</td>
<td>52.98079</td>
<td>60.2585</td>
<td>69.43538</td>
<td>76.88142</td>
<td>82.91657</td>
</tr>
<tr>
<th scope="row">186.5</th>
<td>40.79986</td>
<td>41.95328</td>
<td>43.90078</td>
<td>47.72763</td>
<td>53.13327</td>
<td>60.40303</td>
<td>69.59151</td>
<td>77.06875</td>
<td>83.14578</td>
</tr>
<tr>
<th scope="row">187.5</th>
<td>40.98403</td>
<td>42.13324</td>
<td>44.07388</td>
<td>47.88844</td>
<td>53.28056</td>
<td>60.54199</td>
<td>69.74124</td>
<td>77.2489</td>
<td>83.36727</td>
</tr>
<tr>
<th scope="row">188.5</th>
<td>41.16306</td>
<td>42.3081</td>
<td>44.24193</td>
<td>48.04426</td>
<td>53.42284</td>
<td>60.67562</td>
<td>69.88487</td>
<td>77.42214</td>
<td>83.58126</td>
</tr>
<tr>
<th scope="row">189.5</th>
<td>41.33692</td>
<td>42.47785</td>
<td>44.40496</td>
<td>48.1952</td>
<td>53.56028</td>
<td>60.8042</td>
<td>70.02272</td>
<td>77.58878</td>
<td>83.78795</td>
</tr>
<tr>
<th scope="row">190.5</th>
<td>41.50559</td>
<td>42.64249</td>
<td>44.563</td>
<td>48.34134</td>
<td>53.69307</td>
<td>60.928</td>
<td>70.15513</td>
<td>77.74911</td>
<td>83.98755</td>
</tr>
<tr>
<th scope="row">191.5</th>
<td>41.66907</td>
<td>42.80203</td>
<td>44.71609</td>
<td>48.48279</td>
<td>53.82138</td>
<td>61.04731</td>
<td>70.28244</td>
<td>77.90345</td>
<td>84.18029</td>
</tr>
<tr>
<th scope="row">192.5</th>
<td>41.82734</td>
<td>42.95649</td>
<td>44.8643</td>
<td>48.61968</td>
<td>53.94544</td>
<td>61.16241</td>
<td>70.40499</td>
<td>78.05211</td>
<td>84.36639</td>
</tr>
<tr>
<th scope="row">193.5</th>
<td>41.98043</td>
<td>43.1059</td>
<td>45.00768</td>
<td>48.75212</td>
<td>54.06543</td>
<td>61.2736</td>
<td>70.52314</td>
<td>78.19542</td>
<td>84.54608</td>
</tr>
<tr>
<th scope="row">194.5</th>
<td>42.12835</td>
<td>43.25031</td>
<td>45.14631</td>
<td>48.88026</td>
<td>54.18158</td>
<td>61.3812</td>
<td>70.63725</td>
<td>78.33372</td>
<td>84.7196</td>
</tr>
<tr>
<th scope="row">195.5</th>
<td>42.27115</td>
<td>43.38976</td>
<td>45.28027</td>
<td>49.00422</td>
<td>54.29411</td>
<td>61.48549</td>
<td>70.7477</td>
<td>78.46734</td>
<td>84.88718</td>
</tr>
<tr>
<th scope="row">196.5</th>
<td>42.40886</td>
<td>43.52432</td>
<td>45.40964</td>
<td>49.12417</td>
<td>54.40324</td>
<td>61.58681</td>
<td>70.85484</td>
<td>78.59661</td>
<td>85.04905</td>
</tr>
<tr>
<th scope="row">197.5</th>
<td>42.54155</td>
<td>43.65406</td>
<td>45.53455</td>
<td>49.24026</td>
<td>54.50921</td>
<td>61.68546</td>
<td>70.95905</td>
<td>78.72189</td>
<td>85.20546</td>
</tr>
<tr>
<th scope="row">198.5</th>
<td>42.66928</td>
<td>43.77907</td>
<td>45.65509</td>
<td>49.35265</td>
<td>54.61224</td>
<td>61.78176</td>
<td>71.06071</td>
<td>78.84351</td>
<td>85.35663</td>
</tr>
<tr>
<th scope="row">199.5</th>
<td>42.79212</td>
<td>43.89944</td>
<td>45.77138</td>
<td>49.46152</td>
<td>54.71257</td>
<td>61.87602</td>
<td>71.16017</td>
<td>78.96181</td>
<td>85.50282</td>
</tr>
<tr>
<th scope="row">200.5</th>
<td>42.91017</td>
<td>44.01527</td>
<td>45.88355</td>
<td>49.56702</td>
<td>54.81044</td>
<td>61.96856</td>
<td>71.2578</td>
<td>79.07713</td>
<td>85.64425</td>
</tr>
<tr>
<th scope="row">201.5</th>
<td>43.02352</td>
<td>44.12666</td>
<td>45.99174</td>
<td>49.66936</td>
<td>54.9061</td>
<td>62.05968</td>
<td>71.35395</td>
<td>79.18979</td>
<td>85.78117</td>
</tr>
<tr>
<th scope="row">202.5</th>
<td>43.13227</td>
<td>44.23375</td>
<td>46.09608</td>
<td>49.7687</td>
<td>54.99978</td>
<td>62.1497</td>
<td>71.44899</td>
<td>79.30012</td>
<td>85.91379</td>
</tr>
<tr>
<th scope="row">203.5</th>
<td>43.23654</td>
<td>44.33665</td>
<td>46.19672</td>
<td>49.86524</td>
<td>55.09172</td>
<td>62.23891</td>
<td>71.54326</td>
<td>79.40845</td>
<td>86.04235</td>
</tr>
<tr>
<th scope="row">204.5</th>
<td>43.33646</td>
<td>44.4355</td>
<td>46.29382</td>
<td>49.95916</td>
<td>55.18217</td>
<td>62.32761</td>
<td>71.63707</td>
<td>79.51506</td>
<td>86.16706</td>
</tr>
<tr>
<th scope="row">205.5</th>
<td>43.43215</td>
<td>44.53044</td>
<td>46.38753</td>
<td>50.05066</td>
<td>55.27135</td>
<td>62.41609</td>
<td>71.73076</td>
<td>79.62027</td>
<td>86.28815</td>
</tr>
<tr>
<th scope="row">206.5</th>
<td>43.52374</td>
<td>44.62161</td>
<td>46.47801</td>
<td>50.13993</td>
<td>55.35951</td>
<td>62.50462</td>
<td>71.82463</td>
<td>79.72434</td>
<td>86.40583</td>
</tr>
<tr>
<th scope="row">207.5</th>
<td>43.61137</td>
<td>44.70917</td>
<td>46.56543</td>
<td>50.22716</td>
<td>55.44686</td>
<td>62.59347</td>
<td>71.91896</td>
<td>79.82755</td>
<td>86.52029</td>
</tr>
<tr>
<th scope="row">208.5</th>
<td>43.69521</td>
<td>44.79326</td>
<td>46.64995</td>
<td>50.31253</td>
<td>55.53362</td>
<td>62.68289</td>
<td>72.01403</td>
<td>79.93015</td>
<td>86.63173</td>
</tr>
<tr>
<th scope="row">209.5</th>
<td>43.77538</td>
<td>44.87405</td>
<td>46.73174</td>
<td>50.39624</td>
<td>55.62001</td>
<td>62.77311</td>
<td>72.11008</td>
<td>80.03235</td>
<td>86.74034</td>
</tr>
<tr>
<th scope="row">210.5</th>
<td>43.85205</td>
<td>44.95168</td>
<td>46.81097</td>
<td>50.47847</td>
<td>55.70624</td>
<td>62.86437</td>
<td>72.20733</td>
<td>80.13439</td>
<td>86.84629</td>
</tr>
<tr>
<th scope="row">211.5</th>
<td>43.92537</td>
<td>45.02633</td>
<td>46.8878</td>
<td>50.5594</td>
<td>55.79248</td>
<td>62.95684</td>
<td>72.306</td>
<td>80.23643</td>
<td>86.94976</td>
</tr>
<tr>
<th scope="row">212.5</th>
<td>43.9955</td>
<td>45.09815</td>
<td>46.9624</td>
<td>50.63919</td>
<td>55.87892</td>
<td>63.05073</td>
<td>72.40626</td>
<td>80.33866</td>
<td>87.05088</td>
</tr>
<tr>
<th scope="row">213.5</th>
<td>44.06258</td>
<td>45.16729</td>
<td>47.03493</td>
<td>50.71802</td>
<td>55.96573</td>
<td>63.1462</td>
<td>72.50825</td>
<td>80.4412</td>
<td>87.14981</td>
</tr>
<tr>
<th scope="row">214.5</th>
<td>44.12679</td>
<td>45.23391</td>
<td>47.10554</td>
<td>50.79603</td>
<td>56.05305</td>
<td>63.24336</td>
<td>72.61209</td>
<td>80.54417</td>
<td>87.24667</td>
</tr>
<tr>
<th scope="row">215.5</th>
<td>44.18826</td>
<td>45.29817</td>
<td>47.17437</td>
<td>50.87336</td>
<td>56.141</td>
<td>63.34234</td>
<td>72.71787</td>
<td>80.64766</td>
<td>87.34157</td>
</tr>
<tr>
<th scope="row">216.5</th>
<td>44.24715</td>
<td>45.3602</td>
<td>47.24158</td>
<td>50.95014</td>
<td>56.2297</td>
<td>63.4432</td>
<td>72.82563</td>
<td>80.75172</td>
<td>87.43462</td>
</tr>
<tr>
<th scope="row">217.5</th>
<td>44.3036</td>
<td>45.42015</td>
<td>47.30728</td>
<td>51.02649</td>
<td>56.31922</td>
<td>63.546</td>
<td>72.9354</td>
<td>80.85638</td>
<td>87.5259</td>
</tr>
<tr>
<th scope="row">218.5</th>
<td>44.35775</td>
<td>45.47815</td>
<td>47.3716</td>
<td>51.10249</td>
<td>56.40963</td>
<td>63.65074</td>
<td>73.04714</td>
<td>80.96163</td>
<td>87.61548</td>
</tr>
<tr>
<th scope="row">219.5</th>
<td>44.40973</td>
<td>45.53431</td>
<td>47.43464</td>
<td>51.17823</td>
<td>56.50096</td>
<td>63.7574</td>
<td>73.1608</td>
<td>81.06744</td>
<td>87.70342</td>
</tr>
<tr>
<th scope="row">220.5</th>
<td>44.45965</td>
<td>45.58875</td>
<td>47.4965</td>
<td>51.25375</td>
<td>56.5932</td>
<td>63.86593</td>
<td>73.27626</td>
<td>81.17373</td>
<td>87.78975</td>
</tr>
<tr>
<th scope="row">221.5</th>
<td>44.50764</td>
<td>45.64157</td>
<td>47.55724</td>
<td>51.32908</td>
<td>56.68633</td>
<td>63.9762</td>
<td>73.39338</td>
<td>81.28039</td>
<td>87.87449</td>
</tr>
<tr>
<th scope="row">222.5</th>
<td>44.55377</td>
<td>45.69284</td>
<td>47.61693</td>
<td>51.40422</td>
<td>56.78026</td>
<td>64.08808</td>
<td>73.51197</td>
<td>81.3873</td>
<td>87.95764</td>
</tr>
<tr>
<th scope="row">223.5</th>
<td>44.59815</td>
<td>45.74262</td>
<td>47.67559</td>
<td>51.47916</td>
<td>56.8749</td>
<td>64.20136</td>
<td>73.63178</td>
<td>81.49427</td>
<td>88.03918</td>
</tr>
<tr>
<th scope="row">224.5</th>
<td>44.64082</td>
<td>45.79097</td>
<td>47.73323</td>
<td>51.55381</td>
<td>56.9701</td>
<td>64.3158</td>
<td>73.75253</td>
<td>81.60109</td>
<td>88.11907</td>
</tr>
<tr>
<th scope="row">225.5</th>
<td>44.68185</td>
<td>45.8379</td>
<td>47.78983</td>
<td>51.6281</td>
<td>57.06565</td>
<td>64.4311</td>
<td>73.87389</td>
<td>81.70752</td>
<td>88.19726</td>
</tr>
<tr>
<th scope="row">226.5</th>
<td>44.72126</td>
<td>45.88343</td>
<td>47.84535</td>
<td>51.70189</td>
<td>57.16132</td>
<td>64.54692</td>
<td>73.99546</td>
<td>81.81326</td>
<td>88.27366</td>
</tr>
<tr>
<th scope="row">227.5</th>
<td>44.75906</td>
<td>45.92751</td>
<td>47.89972</td>
<td>51.77499</td>
<td>57.2568</td>
<td>64.66283</td>
<td>74.1168</td>
<td>81.91801</td>
<td>88.34817</td>
</tr>
<tr>
<th scope="row">228.5</th>
<td>44.79521</td>
<td>45.97009</td>
<td>47.9528</td>
<td>51.8472</td>
<td>57.35176</td>
<td>64.77838</td>
<td>74.23744</td>
<td>82.02139</td>
<td>88.42066</td>
</tr>
<tr>
<th scope="row">229.5</th>
<td>44.82969</td>
<td>46.0111</td>
<td>48.00447</td>
<td>51.91825</td>
<td>57.44578</td>
<td>64.89303</td>
<td>74.35682</td>
<td>82.12303</td>
<td>88.491</td>
</tr>
<tr>
<th scope="row">230.5</th>
<td>44.8624</td>
<td>46.0504</td>
<td>48.05453</td>
<td>51.98781</td>
<td>57.5384</td>
<td>65.00619</td>
<td>74.47435</td>
<td>82.22248</td>
<td>88.55903</td>
</tr>
<tr>
<th scope="row">231.5</th>
<td>44.89324</td>
<td>46.08784</td>
<td>48.10274</td>
<td>52.05553</td>
<td>57.6291</td>
<td>65.1172</td>
<td>74.58939</td>
<td>82.31928</td>
<td>88.62455</td>
</tr>
<tr>
<th scope="row">232.5</th>
<td>44.92205</td>
<td>46.12322</td>
<td>48.14882</td>
<td>52.12097</td>
<td>57.71728</td>
<td>65.22534</td>
<td>74.70121</td>
<td>82.41292</td>
<td>88.68734</td>
</tr>
<tr>
<th scope="row">233.5</th>
<td>44.94866</td>
<td>46.1563</td>
<td>48.19244</td>
<td>52.18364</td>
<td>57.80227</td>
<td>65.32981</td>
<td>74.80907</td>
<td>82.50285</td>
<td>88.74718</td>
</tr>
<tr>
<th scope="row">234.5</th>
<td>44.97281</td>
<td>46.18678</td>
<td>48.23321</td>
<td>52.243</td>
<td>57.88334</td>
<td>65.42974</td>
<td>74.91215</td>
<td>82.58851</td>
<td>88.80382</td>
</tr>
<tr>
<th scope="row">235.5</th>
<td>44.99424</td>
<td>46.21432</td>
<td>48.27069</td>
<td>52.29842</td>
<td>57.95967</td>
<td>65.52419</td>
<td>75.00958</td>
<td>82.66927</td>
<td>88.85697</td>
</tr>
<tr>
<th scope="row">236.5</th>
<td>45.0126</td>
<td>46.23851</td>
<td>48.30438</td>
<td>52.34921</td>
<td>58.0304</td>
<td>65.61215</td>
<td>75.10041</td>
<td>82.74448</td>
<td>88.90635</td>
</tr>
<tr>
<th scope="row">237.5</th>
<td>45.02752</td>
<td>46.25891</td>
<td>48.3337</td>
<td>52.3946</td>
<td>58.09453</td>
<td>65.69252</td>
<td>75.18367</td>
<td>82.81345</td>
<td>88.95164</td>
</tr>
<tr>
<th scope="row">238.5</th>
<td>45.03852</td>
<td>46.27498</td>
<td>48.358</td>
<td>52.43376</td>
<td>58.15104</td>
<td>65.76413</td>
<td>75.25831</td>
<td>82.87546</td>
<td>88.99253</td>
</tr>
<tr>
<th scope="row">239.5</th>
<td>45.0451</td>
<td>46.28612</td>
<td>48.37657</td>
<td>52.46576</td>
<td>58.19877</td>
<td>65.82574</td>
<td>75.32321</td>
<td>82.92975</td>
<td>89.02867</td>
</tr>
<tr>
<th scope="row">240</th>
<td>45.04655</td>
<td>46.28963</td>
<td>48.38346</td>
<td>52.47876</td>
<td>58.21897</td>
<td>65.85238</td>
<td>75.35165</td>
<td>82.95375</td>
<td>89.04485</td>
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

