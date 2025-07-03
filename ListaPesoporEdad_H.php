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
<td>2.355451</td>
<td>2.526904</td>
<td>2.773802</td>
<td>3.150611</td>
<td>3.530203</td>
<td>3.879077</td>
<td>4.172493</td>
<td>4.340293</td>
<td>4.446488</td>
</tr>
<tr>
<th scope="row">0.5</th>
<td>2.799549</td>
<td>2.964656</td>
<td>3.20951</td>
<td>3.597396</td>
<td>4.003106</td>
<td>4.387423</td>
<td>4.718161</td>
<td>4.91013</td>
<td>5.032625</td>
</tr>
<tr>
<th scope="row">1.5</th>
<td>3.614688</td>
<td>3.774849</td>
<td>4.020561</td>
<td>4.428873</td>
<td>4.879525</td>
<td>5.327328</td>
<td>5.728153</td>
<td>5.967102</td>
<td>6.121929</td>
</tr>
<tr>
<th scope="row">2.5</th>
<td>4.342341</td>
<td>4.503255</td>
<td>4.754479</td>
<td>5.183378</td>
<td>5.672889</td>
<td>6.175598</td>
<td>6.638979</td>
<td>6.921119</td>
<td>7.10625</td>
</tr>
<tr>
<th scope="row">3.5</th>
<td>4.992898</td>
<td>5.157412</td>
<td>5.416803</td>
<td>5.866806</td>
<td>6.391392</td>
<td>6.942217</td>
<td>7.460702</td>
<td>7.781401</td>
<td>7.993878</td>
</tr>
<tr>
<th scope="row">4.5</th>
<td>5.575169</td>
<td>5.744752</td>
<td>6.013716</td>
<td>6.484969</td>
<td>7.041836</td>
<td>7.635323</td>
<td>8.202193</td>
<td>8.556813</td>
<td>8.793444</td>
</tr>
<tr>
<th scope="row">5.5</th>
<td>6.096775</td>
<td>6.272175</td>
<td>6.551379</td>
<td>7.043627</td>
<td>7.630425</td>
<td>8.262033</td>
<td>8.871384</td>
<td>9.255615</td>
<td>9.513307</td>
</tr>
<tr>
<th scope="row">6.5</th>
<td>6.56443</td>
<td>6.745993</td>
<td>7.035656</td>
<td>7.548346</td>
<td>8.162951</td>
<td>8.828786</td>
<td>9.475466</td>
<td>9.885436</td>
<td>10.16135</td>
</tr>
<tr>
<th scope="row">7.5</th>
<td>6.984123</td>
<td>7.171952</td>
<td>7.472021</td>
<td>8.004399</td>
<td>8.644832</td>
<td>9.34149</td>
<td>10.02101</td>
<td>10.45331</td>
<td>10.74492</td>
</tr>
<tr>
<th scope="row">8.5</th>
<td>7.361236</td>
<td>7.555287</td>
<td>7.865533</td>
<td>8.416719</td>
<td>9.08112</td>
<td>9.805593</td>
<td>10.51406</td>
<td>10.96574</td>
<td>11.27084</td>
</tr>
<tr>
<th scope="row">9.5</th>
<td>7.700624</td>
<td>7.900755</td>
<td>8.220839</td>
<td>8.789882</td>
<td>9.4765</td>
<td>10.22612</td>
<td>10.96017</td>
<td>11.42868</td>
<td>11.74538</td>
</tr>
<tr>
<th scope="row">10.5</th>
<td>8.006677</td>
<td>8.212684</td>
<td>8.542195</td>
<td>9.12811</td>
<td>9.835308</td>
<td>10.60772</td>
<td>11.36445</td>
<td>11.84763</td>
<td>12.17436</td>
</tr>
<tr>
<th scope="row">11.5</th>
<td>8.283365</td>
<td>8.495</td>
<td>8.833486</td>
<td>9.435279</td>
<td>10.16154</td>
<td>10.95466</td>
<td>11.7316</td>
<td>12.22766</td>
<td>12.56308</td>
</tr>
<tr>
<th scope="row">12.5</th>
<td>8.534275</td>
<td>8.751264</td>
<td>9.098246</td>
<td>9.714942</td>
<td>10.45885</td>
<td>11.27087</td>
<td>12.06595</td>
<td>12.5734</td>
<td>12.91645</td>
</tr>
<tr>
<th scope="row">13.5</th>
<td>8.762649</td>
<td>8.984701</td>
<td>9.339688</td>
<td>9.970338</td>
<td>10.73063</td>
<td>11.55996</td>
<td>12.37145</td>
<td>12.88911</td>
<td>13.23893</td>
</tr>
<tr>
<th scope="row">14.5</th>
<td>8.971407</td>
<td>9.198222</td>
<td>9.560722</td>
<td>10.20442</td>
<td>10.97992</td>
<td>11.82524</td>
<td>12.65175</td>
<td>13.17867</td>
<td>13.53462</td>
</tr>
<tr>
<th scope="row">15.5</th>
<td>9.16318</td>
<td>9.394454</td>
<td>9.763982</td>
<td>10.41986</td>
<td>11.20956</td>
<td>12.06973</td>
<td>12.91015</td>
<td>13.44564</td>
<td>13.80724</td>
</tr>
<tr>
<th scope="row">16.5</th>
<td>9.340328</td>
<td>9.575757</td>
<td>9.95184</td>
<td>10.6191</td>
<td>11.42207</td>
<td>12.29617</td>
<td>13.14969</td>
<td>13.69325</td>
<td>14.06019</td>
</tr>
<tr>
<th scope="row">17.5</th>
<td>9.504964</td>
<td>9.744251</td>
<td>10.12643</td>
<td>10.80433</td>
<td>11.61978</td>
<td>12.50708</td>
<td>13.37311</td>
<td>13.92444</td>
<td>14.29655</td>
</tr>
<tr>
<th scope="row">18.5</th>
<td>9.658975</td>
<td>9.90183</td>
<td>10.28968</td>
<td>10.97753</td>
<td>11.80478</td>
<td>12.70473</td>
<td>13.5829</td>
<td>14.14187</td>
<td>14.51909</td>
</tr>
<tr>
<th scope="row">19.5</th>
<td>9.804039</td>
<td>10.05019</td>
<td>10.4433</td>
<td>11.14047</td>
<td>11.97897</td>
<td>12.89117</td>
<td>13.78133</td>
<td>14.34795</td>
<td>14.73034</td>
</tr>
<tr>
<th scope="row">20.5</th>
<td>9.941645</td>
<td>10.19082</td>
<td>10.58881</td>
<td>11.29477</td>
<td>12.14404</td>
<td>13.06825</td>
<td>13.97042</td>
<td>14.54484</td>
<td>14.93256</td>
</tr>
<tr>
<th scope="row">21.5</th>
<td>10.07311</td>
<td>10.32507</td>
<td>10.72759</td>
<td>11.44185</td>
<td>12.30154</td>
<td>13.23765</td>
<td>14.15201</td>
<td>14.73448</td>
<td>15.12777</td>
</tr>
<tr>
<th scope="row">22.5</th>
<td>10.19957</td>
<td>10.4541</td>
<td>10.86084</td>
<td>11.58298</td>
<td>12.45283</td>
<td>13.40086</td>
<td>14.32772</td>
<td>14.91861</td>
<td>15.31777</td>
</tr>
<tr>
<th scope="row">23.5</th>
<td>10.32206</td>
<td>10.57895</td>
<td>10.98963</td>
<td>11.7193</td>
<td>12.59913</td>
<td>13.5592</td>
<td>14.499</td>
<td>15.09876</td>
<td>15.50418</td>
</tr>
<tr>
<th scope="row">24</th>
<td>10.38209</td>
<td>10.64009</td>
<td>11.05266</td>
<td>11.78598</td>
<td>12.67076</td>
<td>13.63692</td>
<td>14.5834</td>
<td>15.18777</td>
<td>15.59648</td>
</tr>
<tr>
<th scope="row">24.5</th>
<td>10.44144</td>
<td>10.70051</td>
<td>11.1149</td>
<td>11.85182</td>
<td>12.74154</td>
<td>13.71386</td>
<td>14.66716</td>
<td>15.2763</td>
<td>15.68841</td>
</tr>
<tr>
<th scope="row">25.5</th>
<td>10.55847</td>
<td>10.81958</td>
<td>11.23747</td>
<td>11.98142</td>
<td>12.88102</td>
<td>13.8659</td>
<td>14.83332</td>
<td>15.45242</td>
<td>15.8717</td>
</tr>
<tr>
<th scope="row">26.5</th>
<td>10.6738</td>
<td>10.93681</td>
<td>11.35806</td>
<td>12.10889</td>
<td>13.01842</td>
<td>14.01623</td>
<td>14.99848</td>
<td>15.62819</td>
<td>16.05514</td>
</tr>
<tr>
<th scope="row">27.5</th>
<td>10.78798</td>
<td>11.0528</td>
<td>11.47728</td>
<td>12.23491</td>
<td>13.1545</td>
<td>14.16567</td>
<td>15.16351</td>
<td>15.8045</td>
<td>16.23967</td>
</tr>
<tr>
<th scope="row">28.5</th>
<td>10.90147</td>
<td>11.16803</td>
<td>11.59567</td>
<td>12.36007</td>
<td>13.2899</td>
<td>14.31493</td>
<td>15.32917</td>
<td>15.98214</td>
<td>16.42609</td>
</tr>
<tr>
<th scope="row">29.5</th>
<td>11.01466</td>
<td>11.28293</td>
<td>11.71368</td>
<td>12.4849</td>
<td>13.42519</td>
<td>14.46462</td>
<td>15.4961</td>
<td>16.16177</td>
<td>16.61508</td>
</tr>
<tr>
<th scope="row">30.5</th>
<td>11.12787</td>
<td>11.39782</td>
<td>11.8317</td>
<td>12.60983</td>
<td>13.56088</td>
<td>14.61527</td>
<td>15.66485</td>
<td>16.34395</td>
<td>16.8072</td>
</tr>
<tr>
<th scope="row">31.5</th>
<td>11.24135</td>
<td>11.513</td>
<td>11.95005</td>
<td>12.73523</td>
<td>13.69738</td>
<td>14.76732</td>
<td>15.83588</td>
<td>16.52915</td>
<td>17.00291</td>
</tr>
<tr>
<th scope="row">32.5</th>
<td>11.3553</td>
<td>11.62869</td>
<td>12.069</td>
<td>12.86144</td>
<td>13.83505</td>
<td>14.92117</td>
<td>16.00958</td>
<td>16.71773</td>
<td>17.2026</td>
</tr>
<tr>
<th scope="row">33.5</th>
<td>11.46988</td>
<td>11.74508</td>
<td>12.18875</td>
<td>12.9887</td>
<td>13.97418</td>
<td>15.07711</td>
<td>16.18624</td>
<td>16.91</td>
<td>17.40654</td>
</tr>
<tr>
<th scope="row">34.5</th>
<td>11.58521</td>
<td>11.8623</td>
<td>12.30948</td>
<td>13.11723</td>
<td>14.11503</td>
<td>15.23541</td>
<td>16.36612</td>
<td>17.10619</td>
<td>17.61495</td>
</tr>
<tr>
<th scope="row">35.5</th>
<td>11.70137</td>
<td>11.98046</td>
<td>12.43132</td>
<td>13.24721</td>
<td>14.2578</td>
<td>15.39628</td>
<td>16.5494</td>
<td>17.30646</td>
<td>17.82797</td>
</tr>
<tr>
<th scope="row">36.5</th>
<td>11.81842</td>
<td>12.09962</td>
<td>12.55436</td>
<td>13.37875</td>
<td>14.40263</td>
<td>15.55987</td>
<td>16.73623</td>
<td>17.51093</td>
<td>18.0457</td>
</tr>
<tr>
<th scope="row">37.5</th>
<td>11.93639</td>
<td>12.21984</td>
<td>12.67868</td>
<td>13.51197</td>
<td>14.54965</td>
<td>15.7263</td>
<td>16.9267</td>
<td>17.71965</td>
<td>18.26818</td>
</tr>
<tr>
<th scope="row">38.5</th>
<td>12.05529</td>
<td>12.34115</td>
<td>12.80431</td>
<td>13.64693</td>
<td>14.69893</td>
<td>15.89565</td>
<td>17.12085</td>
<td>17.93265</td>
<td>18.49539</td>
</tr>
<tr>
<th scope="row">39.5</th>
<td>12.17512</td>
<td>12.46354</td>
<td>12.93128</td>
<td>13.78366</td>
<td>14.85054</td>
<td>16.06797</td>
<td>17.3187</td>
<td>18.14992</td>
<td>18.72731</td>
</tr>
<tr>
<th scope="row">40.5</th>
<td>12.29587</td>
<td>12.58701</td>
<td>13.05959</td>
<td>13.92218</td>
<td>15.00449</td>
<td>16.24326</td>
<td>17.52025</td>
<td>18.37141</td>
<td>18.96385</td>
</tr>
<tr>
<th scope="row">41.5</th>
<td>12.41751</td>
<td>12.71154</td>
<td>13.18923</td>
<td>14.0625</td>
<td>15.16078</td>
<td>16.42153</td>
<td>17.72545</td>
<td>18.59705</td>
<td>19.20492</td>
</tr>
<tr>
<th scope="row">42.5</th>
<td>12.54001</td>
<td>12.8371</td>
<td>13.32017</td>
<td>14.20458</td>
<td>15.3194</td>
<td>16.60273</td>
<td>17.93424</td>
<td>18.82675</td>
<td>19.45041</td>
</tr>
<tr>
<th scope="row">43.5</th>
<td>12.66334</td>
<td>12.96366</td>
<td>13.45238</td>
<td>14.3484</td>
<td>15.4803</td>
<td>16.78682</td>
<td>18.14654</td>
<td>19.06041</td>
<td>19.70017</td>
</tr>
<tr>
<th scope="row">44.5</th>
<td>12.78746</td>
<td>13.09119</td>
<td>13.58581</td>
<td>14.49391</td>
<td>15.64343</td>
<td>16.97373</td>
<td>18.36226</td>
<td>19.29789</td>
<td>19.95407</td>
</tr>
<tr>
<th scope="row">45.5</th>
<td>12.91234</td>
<td>13.21963</td>
<td>13.72043</td>
<td>14.64105</td>
<td>15.80873</td>
<td>17.16336</td>
<td>18.58128</td>
<td>19.53907</td>
<td>20.21195</td>
</tr>
<tr>
<th scope="row">46.5</th>
<td>13.03792</td>
<td>13.34895</td>
<td>13.85618</td>
<td>14.78977</td>
<td>15.9761</td>
<td>17.35564</td>
<td>18.80348</td>
<td>19.78381</td>
<td>20.47366</td>
</tr>
<tr>
<th scope="row">47.5</th>
<td>13.16419</td>
<td>13.47911</td>
<td>13.99301</td>
<td>14.93998</td>
<td>16.14548</td>
<td>17.55044</td>
<td>19.02875</td>
<td>20.03197</td>
<td>20.73903</td>
</tr>
<tr>
<th scope="row">48.5</th>
<td>13.29111</td>
<td>13.61006</td>
<td>14.13086</td>
<td>15.09163</td>
<td>16.31677</td>
<td>17.74767</td>
<td>19.25695</td>
<td>20.28339</td>
<td>21.00793</td>
</tr>
<tr>
<th scope="row">49.5</th>
<td>13.41864</td>
<td>13.74176</td>
<td>14.26968</td>
<td>15.24463</td>
<td>16.48986</td>
<td>17.9472</td>
<td>19.48794</td>
<td>20.53795</td>
<td>21.28018</td>
</tr>
<tr>
<th scope="row">50.5</th>
<td>13.54675</td>
<td>13.87418</td>
<td>14.40943</td>
<td>15.39892</td>
<td>16.66468</td>
<td>18.14892</td>
<td>19.7216</td>
<td>20.79548</td>
<td>21.55565</td>
</tr>
<tr>
<th scope="row">51.5</th>
<td>13.67543</td>
<td>14.00727</td>
<td>14.55004</td>
<td>15.55441</td>
<td>16.8411</td>
<td>18.3527</td>
<td>19.95779</td>
<td>21.05586</td>
<td>21.83419</td>
</tr>
<tr>
<th scope="row">52.5</th>
<td>13.80466</td>
<td>14.14102</td>
<td>14.69148</td>
<td>15.71103</td>
<td>17.01904</td>
<td>18.55842</td>
<td>20.19637</td>
<td>21.31896</td>
<td>22.11568</td>
</tr>
<tr>
<th scope="row">53.5</th>
<td>13.93441</td>
<td>14.2754</td>
<td>14.8337</td>
<td>15.86872</td>
<td>17.19839</td>
<td>18.76598</td>
<td>20.43722</td>
<td>21.58464</td>
<td>22.39999</td>
</tr>
<tr>
<th scope="row">54.5</th>
<td>14.06467</td>
<td>14.41037</td>
<td>14.97666</td>
<td>16.0274</td>
<td>17.37906</td>
<td>18.97524</td>
<td>20.68022</td>
<td>21.8528</td>
<td>22.68702</td>
</tr>
<tr>
<th scope="row">55.5</th>
<td>14.19544</td>
<td>14.54593</td>
<td>15.12032</td>
<td>16.18701</td>
<td>17.56096</td>
<td>19.1861</td>
<td>20.92526</td>
<td>22.12331</td>
<td>22.97667</td>
</tr>
<tr>
<th scope="row">56.5</th>
<td>14.32672</td>
<td>14.68205</td>
<td>15.26465</td>
<td>16.34748</td>
<td>17.744</td>
<td>19.39846</td>
<td>21.17222</td>
<td>22.3961</td>
<td>23.26885</td>
</tr>
<tr>
<th scope="row">57.5</th>
<td>14.4585</td>
<td>14.81872</td>
<td>15.40962</td>
<td>16.50877</td>
<td>17.92809</td>
<td>19.6122</td>
<td>21.421</td>
<td>22.67106</td>
<td>23.56349</td>
</tr>
<tr>
<th scope="row">58.5</th>
<td>14.59079</td>
<td>14.95595</td>
<td>15.55521</td>
<td>16.67081</td>
<td>18.11316</td>
<td>19.82724</td>
<td>21.67152</td>
<td>22.94813</td>
<td>23.86054</td>
</tr>
<tr>
<th scope="row">59.5</th>
<td>14.72359</td>
<td>15.09371</td>
<td>15.70139</td>
<td>16.83356</td>
<td>18.29912</td>
<td>20.04348</td>
<td>21.92369</td>
<td>23.22723</td>
<td>24.15995</td>
</tr>
<tr>
<th scope="row">60.5</th>
<td>14.85692</td>
<td>15.23202</td>
<td>15.84814</td>
<td>16.99698</td>
<td>18.48592</td>
<td>20.26086</td>
<td>22.17744</td>
<td>23.50833</td>
<td>24.46169</td>
</tr>
<tr>
<th scope="row">61.5</th>
<td>14.99078</td>
<td>15.37087</td>
<td>15.99546</td>
<td>17.16103</td>
<td>18.6735</td>
<td>20.47929</td>
<td>22.4327</td>
<td>23.79136</td>
<td>24.76575</td>
</tr>
<tr>
<th scope="row">62.5</th>
<td>15.1252</td>
<td>15.51027</td>
<td>16.14334</td>
<td>17.32567</td>
<td>18.8618</td>
<td>20.69871</td>
<td>22.68943</td>
<td>24.07632</td>
<td>25.07212</td>
</tr>
<tr>
<th scope="row">63.5</th>
<td>15.26018</td>
<td>15.65023</td>
<td>16.29176</td>
<td>17.49088</td>
<td>19.05077</td>
<td>20.91907</td>
<td>22.94758</td>
<td>24.36317</td>
<td>25.38081</td>
</tr>
<tr>
<th scope="row">64.5</th>
<td>15.39575</td>
<td>15.79076</td>
<td>16.44074</td>
<td>17.65664</td>
<td>19.24037</td>
<td>21.14031</td>
<td>23.20712</td>
<td>24.65192</td>
<td>25.69185</td>
</tr>
<tr>
<th scope="row">65.5</th>
<td>15.53193</td>
<td>15.93186</td>
<td>16.59026</td>
<td>17.82293</td>
<td>19.43058</td>
<td>21.36242</td>
<td>23.46802</td>
<td>24.94257</td>
<td>26.00527</td>
</tr>
<tr>
<th scope="row">66.5</th>
<td>15.66872</td>
<td>16.07356</td>
<td>16.74033</td>
<td>17.98974</td>
<td>19.62136</td>
<td>21.58534</td>
<td>23.73029</td>
<td>25.23514</td>
<td>26.32111</td>
</tr>
<tr>
<th scope="row">67.5</th>
<td>15.80617</td>
<td>16.21586</td>
<td>16.89096</td>
<td>18.15706</td>
<td>19.8127</td>
<td>21.80908</td>
<td>23.99391</td>
<td>25.52965</td>
<td>26.63944</td>
</tr>
<tr>
<th scope="row">68.5</th>
<td>15.94427</td>
<td>16.35879</td>
<td>17.04215</td>
<td>18.32489</td>
<td>20.00459</td>
<td>22.0336</td>
<td>24.2589</td>
<td>25.82615</td>
<td>26.96033</td>
</tr>
<tr>
<th scope="row">69.5</th>
<td>16.08306</td>
<td>16.50235</td>
<td>17.19393</td>
<td>18.49324</td>
<td>20.19703</td>
<td>22.25893</td>
<td>24.52527</td>
<td>26.12468</td>
<td>27.28386</td>
</tr>
<tr>
<th scope="row">70.5</th>
<td>16.22255</td>
<td>16.64657</td>
<td>17.34629</td>
<td>18.66211</td>
<td>20.39002</td>
<td>22.48505</td>
<td>24.79305</td>
<td>26.4253</td>
<td>27.6101</td>
</tr>
<tr>
<th scope="row">71.5</th>
<td>16.36276</td>
<td>16.79146</td>
<td>17.49926</td>
<td>18.83151</td>
<td>20.58357</td>
<td>22.712</td>
<td>25.06229</td>
<td>26.72807</td>
<td>27.93916</td>
</tr>
<tr>
<th scope="row">72.5</th>
<td>16.5037</td>
<td>16.93704</td>
<td>17.65285</td>
<td>19.00147</td>
<td>20.7777</td>
<td>22.93978</td>
<td>25.33302</td>
<td>27.03308</td>
<td>28.27115</td>
</tr>
<tr>
<th scope="row">73.5</th>
<td>16.64539</td>
<td>17.08332</td>
<td>17.80708</td>
<td>19.17199</td>
<td>20.97243</td>
<td>23.16845</td>
<td>25.6053</td>
<td>27.34039</td>
<td>28.60616</td>
</tr>
<tr>
<th scope="row">74.5</th>
<td>16.78785</td>
<td>17.23031</td>
<td>17.96197</td>
<td>19.34311</td>
<td>21.16779</td>
<td>23.39803</td>
<td>25.87919</td>
<td>27.6501</td>
<td>28.94432</td>
</tr>
<tr>
<th scope="row">75.5</th>
<td>16.93107</td>
<td>17.37804</td>
<td>18.11754</td>
<td>19.51485</td>
<td>21.36383</td>
<td>23.62858</td>
<td>26.15477</td>
<td>27.9623</td>
<td>29.28574</td>
</tr>
<tr>
<th scope="row">76.5</th>
<td>17.07507</td>
<td>17.52651</td>
<td>18.2738</td>
<td>19.68724</td>
<td>21.56058</td>
<td>23.86016</td>
<td>26.4321</td>
<td>28.27709</td>
<td>29.63055</td>
</tr>
<tr>
<th scope="row">77.5</th>
<td>17.21986</td>
<td>17.67574</td>
<td>18.43077</td>
<td>19.86032</td>
<td>21.75811</td>
<td>24.09284</td>
<td>26.71128</td>
<td>28.59457</td>
<td>29.97888</td>
</tr>
<tr>
<th scope="row">78.5</th>
<td>17.36543</td>
<td>17.82572</td>
<td>18.58848</td>
<td>20.03413</td>
<td>21.95645</td>
<td>24.32667</td>
<td>26.99239</td>
<td>28.91486</td>
<td>30.33083</td>
</tr>
<tr>
<th scope="row">79.5</th>
<td>17.5118</td>
<td>17.97649</td>
<td>18.74695</td>
<td>20.20871</td>
<td>22.15567</td>
<td>24.56175</td>
<td>27.27553</td>
<td>29.23806</td>
<td>30.68656</td>
</tr>
<tr>
<th scope="row">80.5</th>
<td>17.65895</td>
<td>18.12803</td>
<td>18.9062</td>
<td>20.38409</td>
<td>22.35584</td>
<td>24.79815</td>
<td>27.56081</td>
<td>29.56428</td>
<td>31.04617</td>
</tr>
<tr>
<th scope="row">81.5</th>
<td>17.80689</td>
<td>18.28036</td>
<td>19.06624</td>
<td>20.56032</td>
<td>22.55702</td>
<td>25.03598</td>
<td>27.84832</td>
<td>29.89365</td>
<td>31.4098</td>
</tr>
<tr>
<th scope="row">82.5</th>
<td>17.9556</td>
<td>18.43348</td>
<td>19.2271</td>
<td>20.73745</td>
<td>22.7593</td>
<td>25.27531</td>
<td>28.13817</td>
<td>30.22628</td>
<td>31.77756</td>
</tr>
<tr>
<th scope="row">83.5</th>
<td>18.10509</td>
<td>18.5874</td>
<td>19.3888</td>
<td>20.91553</td>
<td>22.96273</td>
<td>25.51626</td>
<td>28.43049</td>
<td>30.56228</td>
<td>32.14959</td>
</tr>
<tr>
<th scope="row">84.5</th>
<td>18.25535</td>
<td>18.74211</td>
<td>19.55136</td>
<td>21.0946</td>
<td>23.16742</td>
<td>25.75894</td>
<td>28.72538</td>
<td>30.90178</td>
<td>32.52599</td>
</tr>
<tr>
<th scope="row">85.5</th>
<td>18.40637</td>
<td>18.89763</td>
<td>19.71479</td>
<td>21.27471</td>
<td>23.37343</td>
<td>26.00344</td>
<td>29.02298</td>
<td>31.24489</td>
<td>32.90689</td>
</tr>
<tr>
<th scope="row">86.5</th>
<td>18.55813</td>
<td>19.05395</td>
<td>19.87913</td>
<td>21.45592</td>
<td>23.58086</td>
<td>26.24988</td>
<td>29.3234</td>
<td>31.59174</td>
<td>33.29238</td>
</tr>
<tr>
<th scope="row">87.5</th>
<td>18.71062</td>
<td>19.21107</td>
<td>20.04438</td>
<td>21.63828</td>
<td>23.78979</td>
<td>26.49839</td>
<td>29.62676</td>
<td>31.94243</td>
<td>33.68257</td>
</tr>
<tr>
<th scope="row">88.5</th>
<td>18.86385</td>
<td>19.369</td>
<td>20.21057</td>
<td>21.82185</td>
<td>24.00031</td>
<td>26.74907</td>
<td>29.9332</td>
<td>32.29708</td>
<td>34.07755</td>
</tr>
<tr>
<th scope="row">89.5</th>
<td>19.01778</td>
<td>19.52773</td>
<td>20.37771</td>
<td>22.00666</td>
<td>24.21251</td>
<td>27.00204</td>
<td>30.24283</td>
<td>32.65581</td>
<td>34.47742</td>
</tr>
<tr>
<th scope="row">90.5</th>
<td>19.17243</td>
<td>19.68727</td>
<td>20.54584</td>
<td>22.19278</td>
<td>24.42648</td>
<td>27.25743</td>
<td>30.55579</td>
<td>33.01871</td>
<td>34.88226</td>
</tr>
<tr>
<th scope="row">91.5</th>
<td>19.32776</td>
<td>19.84762</td>
<td>20.71496</td>
<td>22.38027</td>
<td>24.64231</td>
<td>27.51535</td>
<td>30.8722</td>
<td>33.38591</td>
<td>35.29215</td>
</tr>
<tr>
<th scope="row">92.5</th>
<td>19.48379</td>
<td>20.00878</td>
<td>20.88511</td>
<td>22.56917</td>
<td>24.8601</td>
<td>27.77593</td>
<td>31.19218</td>
<td>33.75749</td>
<td>35.70715</td>
</tr>
<tr>
<th scope="row">93.5</th>
<td>19.6405</td>
<td>20.17076</td>
<td>21.05629</td>
<td>22.75955</td>
<td>25.07992</td>
<td>28.03928</td>
<td>31.51586</td>
<td>34.13355</td>
<td>36.12732</td>
</tr>
<tr>
<th scope="row">94.5</th>
<td>19.79788</td>
<td>20.33357</td>
<td>21.22855</td>
<td>22.95145</td>
<td>25.30189</td>
<td>28.30554</td>
<td>31.84335</td>
<td>34.5142</td>
<td>36.55271</td>
</tr>
<tr>
<th scope="row">95.5</th>
<td>19.95594</td>
<td>20.4972</td>
<td>21.4019</td>
<td>23.14493</td>
<td>25.52607</td>
<td>28.5748</td>
<td>32.17478</td>
<td>34.8995</td>
<td>36.98338</td>
</tr>
<tr>
<th scope="row">96.5</th>
<td>20.11467</td>
<td>20.66168</td>
<td>21.57637</td>
<td>23.34005</td>
<td>25.75257</td>
<td>28.84718</td>
<td>32.51025</td>
<td>35.28955</td>
<td>37.41935</td>
</tr>
<tr>
<th scope="row">97.5</th>
<td>20.27408</td>
<td>20.82702</td>
<td>21.75198</td>
<td>23.53686</td>
<td>25.98146</td>
<td>29.12281</td>
<td>32.84988</td>
<td>35.68443</td>
<td>37.86065</td>
</tr>
<tr>
<th scope="row">98.5</th>
<td>20.43418</td>
<td>20.99322</td>
<td>21.92878</td>
<td>23.73542</td>
<td>26.21284</td>
<td>29.40179</td>
<td>33.19377</td>
<td>36.08419</td>
<td>38.30731</td>
</tr>
<tr>
<th scope="row">99.5</th>
<td>20.59497</td>
<td>21.16032</td>
<td>22.10678</td>
<td>23.93579</td>
<td>26.44679</td>
<td>29.68422</td>
<td>33.54202</td>
<td>36.4889</td>
<td>38.75932</td>
</tr>
<tr>
<th scope="row">100.5</th>
<td>20.75647</td>
<td>21.32832</td>
<td>22.28602</td>
<td>24.13801</td>
<td>26.68339</td>
<td>29.97021</td>
<td>33.89472</td>
<td>36.89862</td>
<td>39.2167</td>
</tr>
<tr>
<th scope="row">101.5</th>
<td>20.91869</td>
<td>21.49726</td>
<td>22.46654</td>
<td>24.34216</td>
<td>26.92273</td>
<td>30.25986</td>
<td>34.25197</td>
<td>37.3134</td>
<td>39.67943</td>
</tr>
<tr>
<th scope="row">102.5</th>
<td>21.08166</td>
<td>21.66716</td>
<td>22.64838</td>
<td>24.54828</td>
<td>27.16489</td>
<td>30.55326</td>
<td>34.61384</td>
<td>37.73327</td>
<td>40.14749</td>
</tr>
<tr>
<th scope="row">103.5</th>
<td>21.2454</td>
<td>21.83805</td>
<td>22.83157</td>
<td>24.75645</td>
<td>27.40995</td>
<td>30.85051</td>
<td>34.98041</td>
<td>38.15826</td>
<td>40.62087</td>
</tr>
<tr>
<th scope="row">104.5</th>
<td>21.40994</td>
<td>22.00997</td>
<td>23.01617</td>
<td>24.9667</td>
<td>27.65797</td>
<td>31.15169</td>
<td>35.35176</td>
<td>38.58841</td>
<td>41.09952</td>
</tr>
<tr>
<th scope="row">105.5</th>
<td>21.57532</td>
<td>22.18296</td>
<td>23.20222</td>
<td>25.17912</td>
<td>27.90904</td>
<td>31.45689</td>
<td>35.72793</td>
<td>39.02372</td>
<td>41.5834</td>
</tr>
<tr>
<th scope="row">106.5</th>
<td>21.74156</td>
<td>22.35705</td>
<td>23.38976</td>
<td>25.39375</td>
<td>28.16324</td>
<td>31.76618</td>
<td>36.10899</td>
<td>39.46421</td>
<td>42.07247</td>
</tr>
<tr>
<th scope="row">107.5</th>
<td>21.90873</td>
<td>22.5323</td>
<td>23.57885</td>
<td>25.61067</td>
<td>28.42064</td>
<td>32.07964</td>
<td>36.49499</td>
<td>39.90987</td>
<td>42.56665</td>
</tr>
<tr>
<th scope="row">108.5</th>
<td>22.07685</td>
<td>22.70876</td>
<td>23.76955</td>
<td>25.82993</td>
<td>28.6813</td>
<td>32.39734</td>
<td>36.88596</td>
<td>40.36069</td>
<td>43.06589</td>
</tr>
<tr>
<th scope="row">109.5</th>
<td>22.24599</td>
<td>22.88648</td>
<td>23.96192</td>
<td>26.05161</td>
<td>28.9453</td>
<td>32.71933</td>
<td>37.28193</td>
<td>40.81665</td>
<td>43.5701</td>
</tr>
<tr>
<th scope="row">110.5</th>
<td>22.4162</td>
<td>23.06551</td>
<td>24.15601</td>
<td>26.27576</td>
<td>29.21271</td>
<td>33.04569</td>
<td>37.68294</td>
<td>41.27773</td>
<td>44.0792</td>
</tr>
<tr>
<th scope="row">111.5</th>
<td>22.58754</td>
<td>23.24593</td>
<td>24.35189</td>
<td>26.50246</td>
<td>29.48359</td>
<td>33.37646</td>
<td>38.08898</td>
<td>41.74388</td>
<td>44.5931</td>
</tr>
<tr>
<th scope="row">112.5</th>
<td>22.76008</td>
<td>23.42779</td>
<td>24.54962</td>
<td>26.73177</td>
<td>29.758</td>
<td>33.7117</td>
<td>38.50008</td>
<td>42.21507</td>
<td>45.11169</td>
</tr>
<tr>
<th scope="row">113.5</th>
<td>22.93388</td>
<td>23.61117</td>
<td>24.74929</td>
<td>26.96376</td>
<td>30.03602</td>
<td>34.05144</td>
<td>38.91622</td>
<td>42.69124</td>
<td>45.63487</td>
</tr>
<tr>
<th scope="row">114.5</th>
<td>23.10902</td>
<td>23.79613</td>
<td>24.95096</td>
<td>27.19851</td>
<td>30.3177</td>
<td>34.39573</td>
<td>39.33741</td>
<td>43.17232</td>
<td>46.16253</td>
</tr>
<tr>
<th scope="row">115.5</th>
<td>23.28558</td>
<td>23.98277</td>
<td>25.1547</td>
<td>27.43609</td>
<td>30.60311</td>
<td>34.7446</td>
<td>39.76363</td>
<td>43.65825</td>
<td>46.69454</td>
</tr>
<tr>
<th scope="row">116.5</th>
<td>23.46364</td>
<td>24.17115</td>
<td>25.3606</td>
<td>27.67657</td>
<td>30.8923</td>
<td>35.09808</td>
<td>40.19484</td>
<td>44.14895</td>
<td>47.23077</td>
</tr>
<tr>
<th scope="row">117.5</th>
<td>23.64329</td>
<td>24.36137</td>
<td>25.56874</td>
<td>27.92001</td>
<td>31.18533</td>
<td>35.4562</td>
<td>40.63103</td>
<td>44.64432</td>
<td>47.77109</td>
</tr>
<tr>
<th scope="row">118.5</th>
<td>23.8246</td>
<td>24.55351</td>
<td>25.77921</td>
<td>28.16651</td>
<td>31.48225</td>
<td>35.81896</td>
<td>41.07214</td>
<td>45.14428</td>
<td>48.31536</td>
</tr>
<tr>
<th scope="row">119.5</th>
<td>24.00769</td>
<td>24.74766</td>
<td>25.99208</td>
<td>28.41613</td>
<td>31.78312</td>
<td>36.1864</td>
<td>41.51813</td>
<td>45.64872</td>
<td>48.86343</td>
</tr>
<tr>
<th scope="row">120.5</th>
<td>24.19264</td>
<td>24.94392</td>
<td>26.20745</td>
<td>28.66894</td>
<td>32.08799</td>
<td>36.55851</td>
<td>41.96894</td>
<td>46.15753</td>
<td>49.41515</td>
</tr>
<tr>
<th scope="row">121.5</th>
<td>24.37956</td>
<td>25.14238</td>
<td>26.42541</td>
<td>28.92502</td>
<td>32.3969</td>
<td>36.93529</td>
<td>42.42452</td>
<td>46.6706</td>
<td>49.97037</td>
</tr>
<tr>
<th scope="row">122.5</th>
<td>24.56855</td>
<td>25.34314</td>
<td>26.64604</td>
<td>29.18446</td>
<td>32.70991</td>
<td>37.31675</td>
<td>42.88478</td>
<td>47.1878</td>
<td>50.52892</td>
</tr>
<tr>
<th scope="row">123.5</th>
<td>24.75971</td>
<td>25.54631</td>
<td>26.86945</td>
<td>29.44731</td>
<td>33.02704</td>
<td>37.70287</td>
<td>43.34967</td>
<td>47.70901</td>
<td>51.09064</td>
</tr>
<tr>
<th scope="row">124.5</th>
<td>24.95315</td>
<td>25.75198</td>
<td>27.09573</td>
<td>29.71365</td>
<td>33.34835</td>
<td>38.09365</td>
<td>43.81908</td>
<td>48.23408</td>
<td>51.65537</td>
</tr>
<tr>
<th scope="row">125.5</th>
<td>25.14898</td>
<td>25.96027</td>
<td>27.32496</td>
<td>29.98357</td>
<td>33.67387</td>
<td>38.48906</td>
<td>44.29292</td>
<td>48.76288</td>
<td>52.22293</td>
</tr>
<tr>
<th scope="row">126.5</th>
<td>25.34731</td>
<td>26.17126</td>
<td>27.55726</td>
<td>30.25713</td>
<td>34.00363</td>
<td>38.88907</td>
<td>44.77111</td>
<td>49.29526</td>
<td>52.79314</td>
</tr>
<tr>
<th scope="row">127.5</th>
<td>25.54826</td>
<td>26.38509</td>
<td>27.7927</td>
<td>30.53439</td>
<td>34.33766</td>
<td>39.29366</td>
<td>45.25354</td>
<td>49.83107</td>
<td>53.36584</td>
</tr>
<tr>
<th scope="row">128.5</th>
<td>25.75195</td>
<td>26.60184</td>
<td>28.0314</td>
<td>30.81543</td>
<td>34.67599</td>
<td>39.7028</td>
<td>45.7401</td>
<td>50.37016</td>
<td>53.94084</td>
</tr>
<tr>
<th scope="row">129.5</th>
<td>25.95847</td>
<td>26.82163</td>
<td>28.27343</td>
<td>31.10032</td>
<td>35.01864</td>
<td>40.11642</td>
<td>46.23066</td>
<td>50.91236</td>
<td>54.51797</td>
</tr>
<tr>
<th scope="row">130.5</th>
<td>26.16796</td>
<td>27.04457</td>
<td>28.51891</td>
<td>31.38912</td>
<td>35.36562</td>
<td>40.5345</td>
<td>46.72512</td>
<td>51.45752</td>
<td>55.09704</td>
</tr>
<tr>
<th scope="row">131.5</th>
<td>26.38051</td>
<td>27.27076</td>
<td>28.76791</td>
<td>31.68189</td>
<td>35.71695</td>
<td>40.95697</td>
<td>47.22334</td>
<td>52.00546</td>
<td>55.67787</td>
</tr>
<tr>
<th scope="row">132.5</th>
<td>26.59626</td>
<td>27.50031</td>
<td>29.02052</td>
<td>31.97868</td>
<td>36.07263</td>
<td>41.38377</td>
<td>47.72519</td>
<td>52.55602</td>
<td>56.26029</td>
</tr>
<tr>
<th scope="row">133.5</th>
<td>26.81531</td>
<td>27.73332</td>
<td>29.27685</td>
<td>32.27955</td>
<td>36.43266</td>
<td>41.81484</td>
<td>48.23054</td>
<td>53.10903</td>
<td>56.84411</td>
</tr>
<tr>
<th scope="row">134.5</th>
<td>27.03777</td>
<td>27.96989</td>
<td>29.53696</td>
<td>32.58454</td>
<td>36.79704</td>
<td>42.2501</td>
<td>48.73924</td>
<td>53.66432</td>
<td>57.42915</td>
</tr>
<tr>
<th scope="row">135.5</th>
<td>27.26376</td>
<td>28.21013</td>
<td>29.80095</td>
<td>32.89371</td>
<td>37.16577</td>
<td>42.68947</td>
<td>49.25114</td>
<td>54.22171</td>
<td>58.01524</td>
</tr>
<tr>
<th scope="row">136.5</th>
<td>27.49337</td>
<td>28.45412</td>
<td>30.06888</td>
<td>33.20709</td>
<td>37.53881</td>
<td>43.13287</td>
<td>49.76611</td>
<td>54.78102</td>
<td>58.60219</td>
</tr>
<tr>
<th scope="row">137.5</th>
<td>27.72672</td>
<td>28.70197</td>
<td>30.34084</td>
<td>33.52472</td>
<td>37.91616</td>
<td>43.5802</td>
<td>50.28397</td>
<td>55.34208</td>
<td>59.18983</td>
</tr>
<tr>
<th scope="row">138.5</th>
<td>27.9639</td>
<td>28.95376</td>
<td>30.61689</td>
<td>33.84662</td>
<td>38.29777</td>
<td>44.03137</td>
<td>50.80458</td>
<td>55.9047</td>
<td>59.77799</td>
</tr>
<tr>
<th scope="row">139.5</th>
<td>28.20501</td>
<td>29.20958</td>
<td>30.8971</td>
<td>34.17281</td>
<td>38.68361</td>
<td>44.48627</td>
<td>51.32778</td>
<td>56.46873</td>
<td>60.3665</td>
</tr>
<tr>
<th scope="row">140.5</th>
<td>28.45015</td>
<td>29.4695</td>
<td>31.18151</td>
<td>34.5033</td>
<td>39.07364</td>
<td>44.94478</td>
<td>51.85339</td>
<td>57.03397</td>
<td>60.95519</td>
</tr>
<tr>
<th scope="row">141.5</th>
<td>28.69939</td>
<td>29.7336</td>
<td>31.4702</td>
<td>34.83811</td>
<td>39.46781</td>
<td>45.40679</td>
<td>52.38125</td>
<td>57.60024</td>
<td>61.5439</td>
</tr>
<tr>
<th scope="row">142.5</th>
<td>28.95283</td>
<td>30.00195</td>
<td>31.76319</td>
<td>35.17724</td>
<td>39.86604</td>
<td>45.87218</td>
<td>52.91119</td>
<td>58.16739</td>
<td>62.13246</td>
</tr>
<tr>
<th scope="row">143.5</th>
<td>29.21053</td>
<td>30.2746</td>
<td>32.06052</td>
<td>35.52066</td>
<td>40.26828</td>
<td>46.3408</td>
<td>53.44304</td>
<td>58.73522</td>
<td>62.72072</td>
</tr>
<tr>
<th scope="row">144.5</th>
<td>29.47257</td>
<td>30.55162</td>
<td>32.36224</td>
<td>35.86837</td>
<td>40.67444</td>
<td>46.81253</td>
<td>53.97661</td>
<td>59.30357</td>
<td>63.30853</td>
</tr>
<tr>
<th scope="row">145.5</th>
<td>29.739</td>
<td>30.83304</td>
<td>32.66834</td>
<td>36.22034</td>
<td>41.08443</td>
<td>47.28721</td>
<td>54.51174</td>
<td>59.87226</td>
<td>63.89573</td>
</tr>
<tr>
<th scope="row">146.5</th>
<td>30.00988</td>
<td>31.11891</td>
<td>32.97885</td>
<td>36.57653</td>
<td>41.49817</td>
<td>47.7647</td>
<td>55.04825</td>
<td>60.44112</td>
<td>64.48219</td>
</tr>
<tr>
<th scope="row">147.5</th>
<td>30.28525</td>
<td>31.40925</td>
<td>33.29378</td>
<td>36.9369</td>
<td>41.91555</td>
<td>48.24483</td>
<td>55.58594</td>
<td>61.00999</td>
<td>65.06776</td>
</tr>
<tr>
<th scope="row">148.5</th>
<td>30.56516</td>
<td>31.70409</td>
<td>33.6131</td>
<td>37.30138</td>
<td>42.33644</td>
<td>48.72744</td>
<td>56.12464</td>
<td>61.57871</td>
<td>65.65231</td>
</tr>
<tr>
<th scope="row">149.5</th>
<td>30.84962</td>
<td>32.00343</td>
<td>33.93681</td>
<td>37.66991</td>
<td>42.76073</td>
<td>49.21236</td>
<td>56.66416</td>
<td>62.1471</td>
<td>66.2357</td>
</tr>
<tr>
<th scope="row">150.5</th>
<td>31.13865</td>
<td>32.30727</td>
<td>34.26488</td>
<td>38.04241</td>
<td>43.18828</td>
<td>49.6994</td>
<td>57.20431</td>
<td>62.715</td>
<td>66.81782</td>
</tr>
<tr>
<th scope="row">151.5</th>
<td>31.43227</td>
<td>32.61561</td>
<td>34.59726</td>
<td>38.4188</td>
<td>43.61896</td>
<td>50.18839</td>
<td>57.74492</td>
<td>63.28226</td>
<td>67.39854</td>
</tr>
<tr>
<th scope="row">152.5</th>
<td>31.73046</td>
<td>32.92842</td>
<td>34.93391</td>
<td>38.79897</td>
<td>44.05259</td>
<td>50.67913</td>
<td>58.28578</td>
<td>63.84873</td>
<td>67.97776</td>
</tr>
<tr>
<th scope="row">153.5</th>
<td>32.03321</td>
<td>33.24567</td>
<td>35.27477</td>
<td>39.18281</td>
<td>44.48903</td>
<td>51.17143</td>
<td>58.82671</td>
<td>64.41424</td>
<td>68.55535</td>
</tr>
<tr>
<th scope="row">154.5</th>
<td>32.3405</td>
<td>33.56731</td>
<td>35.61976</td>
<td>39.5702</td>
<td>44.92809</td>
<td>51.66508</td>
<td>59.36752</td>
<td>64.97865</td>
<td>69.13122</td>
</tr>
<tr>
<th scope="row">155.5</th>
<td>32.65229</td>
<td>33.89329</td>
<td>35.96879</td>
<td>39.96099</td>
<td>45.3696</td>
<td>52.15987</td>
<td>59.90801</td>
<td>65.54182</td>
<td>69.70526</td>
</tr>
<tr>
<th scope="row">156.5</th>
<td>32.96852</td>
<td>34.22353</td>
<td>36.32176</td>
<td>40.35506</td>
<td>45.81336</td>
<td>52.65558</td>
<td>60.448</td>
<td>66.10359</td>
<td>70.27738</td>
</tr>
<tr>
<th scope="row">157.5</th>
<td>33.28913</td>
<td>34.55796</td>
<td>36.67857</td>
<td>40.75222</td>
<td>46.25917</td>
<td>53.152</td>
<td>60.98729</td>
<td>66.66382</td>
<td>70.84748</td>
</tr>
<tr>
<th scope="row">158.5</th>
<td>33.61404</td>
<td>34.89647</td>
<td>37.03908</td>
<td>41.15232</td>
<td>46.70681</td>
<td>53.64889</td>
<td>61.52569</td>
<td>67.22238</td>
<td>71.41549</td>
</tr>
<tr>
<th scope="row">159.5</th>
<td>33.94317</td>
<td>35.23896</td>
<td>37.40317</td>
<td>41.55516</td>
<td>47.15606</td>
<td>54.14603</td>
<td>62.063</td>
<td>67.77913</td>
<td>71.98133</td>
</tr>
<tr>
<th scope="row">160.5</th>
<td>34.27642</td>
<td>35.58531</td>
<td>37.77067</td>
<td>41.96056</td>
<td>47.60669</td>
<td>54.64318</td>
<td>62.59903</td>
<td>68.33393</td>
<td>72.5449</td>
</tr>
<tr>
<th scope="row">161.5</th>
<td>34.61365</td>
<td>35.93538</td>
<td>38.14143</td>
<td>42.3683</td>
<td>48.05847</td>
<td>55.1401</td>
<td>63.13359</td>
<td>68.88665</td>
<td>73.10614</td>
</tr>
<tr>
<th scope="row">162.5</th>
<td>34.95475</td>
<td>36.28902</td>
<td>38.51526</td>
<td>42.77818</td>
<td>48.51113</td>
<td>55.63653</td>
<td>63.66648</td>
<td>69.43717</td>
<td>73.66498</td>
</tr>
<tr>
<th scope="row">163.5</th>
<td>35.29956</td>
<td>36.64606</td>
<td>38.89198</td>
<td>43.18995</td>
<td>48.96443</td>
<td>56.13224</td>
<td>64.1975</td>
<td>69.98535</td>
<td>74.22134</td>
</tr>
<tr>
<th scope="row">164.5</th>
<td>35.64794</td>
<td>37.00634</td>
<td>39.27138</td>
<td>43.60337</td>
<td>49.4181</td>
<td>56.62696</td>
<td>64.72647</td>
<td>70.53106</td>
<td>74.77517</td>
</tr>
<tr>
<th scope="row">165.5</th>
<td>35.99969</td>
<td>37.36965</td>
<td>39.65325</td>
<td>44.01821</td>
<td>49.87187</td>
<td>57.12044</td>
<td>65.25318</td>
<td>71.07419</td>
<td>75.32641</td>
</tr>
<tr>
<th scope="row">166.5</th>
<td>36.35464</td>
<td>37.7358</td>
<td>40.03736</td>
<td>44.43419</td>
<td>50.32546</td>
<td>57.61241</td>
<td>65.77745</td>
<td>71.61461</td>
<td>75.87498</td>
</tr>
<tr>
<th scope="row">167.5</th>
<td>36.71259</td>
<td>38.10456</td>
<td>40.42347</td>
<td>44.85104</td>
<td>50.77859</td>
<td>58.10262</td>
<td>66.29907</td>
<td>72.15219</td>
<td>76.42083</td>
</tr>
<tr>
<th scope="row">168.5</th>
<td>37.07331</td>
<td>38.47571</td>
<td>40.81133</td>
<td>45.26849</td>
<td>51.23096</td>
<td>58.5908</td>
<td>66.81785</td>
<td>72.68681</td>
<td>76.9639</td>
</tr>
<tr>
<th scope="row">169.5</th>
<td>37.43658</td>
<td>38.849</td>
<td>41.20067</td>
<td>45.68625</td>
<td>51.68229</td>
<td>59.07667</td>
<td>67.33359</td>
<td>73.21836</td>
<td>77.50413</td>
</tr>
<tr>
<th scope="row">170.5</th>
<td>37.80215</td>
<td>39.22417</td>
<td>41.59121</td>
<td>46.10402</td>
<td>52.13226</td>
<td>59.55998</td>
<td>67.84611</td>
<td>73.7467</td>
<td>78.04146</td>
</tr>
<tr>
<th scope="row">171.5</th>
<td>38.16976</td>
<td>39.60097</td>
<td>41.98269</td>
<td>46.52151</td>
<td>52.58059</td>
<td>60.04046</td>
<td>68.3552</td>
<td>74.27172</td>
<td>78.57582</td>
</tr>
<tr>
<th scope="row">172.5</th>
<td>38.53916</td>
<td>39.97909</td>
<td>42.37479</td>
<td>46.9384</td>
<td>53.02696</td>
<td>60.51782</td>
<td>68.86067</td>
<td>74.7933</td>
<td>79.10716</td>
</tr>
<tr>
<th scope="row">173.5</th>
<td>38.91004</td>
<td>40.35826</td>
<td>42.76722</td>
<td>47.35437</td>
<td>53.47107</td>
<td>60.99182</td>
<td>69.36233</td>
<td>75.3113</td>
<td>79.63542</td>
</tr>
<tr>
<th scope="row">174.5</th>
<td>39.28212</td>
<td>40.73817</td>
<td>43.15967</td>
<td>47.76912</td>
<td>53.91261</td>
<td>61.46217</td>
<td>69.85999</td>
<td>75.82561</td>
<td>80.1605</td>
</tr>
<tr>
<th scope="row">175.5</th>
<td>39.65509</td>
<td>41.11851</td>
<td>43.55182</td>
<td>48.18232</td>
<td>54.35128</td>
<td>61.92862</td>
<td>70.35345</td>
<td>76.3361</td>
<td>80.68236</td>
</tr>
<tr>
<th scope="row">176.5</th>
<td>40.02863</td>
<td>41.49895</td>
<td>43.94334</td>
<td>48.59365</td>
<td>54.78677</td>
<td>62.3909</td>
<td>70.84252</td>
<td>76.84263</td>
<td>81.2009</td>
</tr>
<tr>
<th scope="row">177.5</th>
<td>40.40241</td>
<td>41.87917</td>
<td>44.3339</td>
<td>49.00279</td>
<td>55.21878</td>
<td>62.84876</td>
<td>71.32701</td>
<td>77.34509</td>
<td>81.71605</td>
</tr>
<tr>
<th scope="row">178.5</th>
<td>40.77608</td>
<td>42.25882</td>
<td>44.72317</td>
<td>49.40941</td>
<td>55.64701</td>
<td>63.30195</td>
<td>71.80674</td>
<td>77.84332</td>
<td>82.2277</td>
</tr>
<tr>
<th scope="row">179.5</th>
<td>41.14932</td>
<td>42.63757</td>
<td>45.1108</td>
<td>49.81318</td>
<td>56.07116</td>
<td>63.75019</td>
<td>72.2815</td>
<td>78.3372</td>
<td>82.73579</td>
</tr>
<tr>
<th scope="row">180.5</th>
<td>41.52175</td>
<td>43.01506</td>
<td>45.49646</td>
<td>50.21378</td>
<td>56.49096</td>
<td>64.19328</td>
<td>72.75113</td>
<td>78.82659</td>
<td>83.24017</td>
</tr>
<tr>
<th scope="row">181.5</th>
<td>41.89302</td>
<td>43.39093</td>
<td>45.8798</td>
<td>50.61091</td>
<td>56.90611</td>
<td>64.63096</td>
<td>73.21544</td>
<td>79.31134</td>
<td>83.74075</td>
</tr>
<tr>
<th scope="row">182.5</th>
<td>42.26275</td>
<td>43.76482</td>
<td>46.26048</td>
<td>51.00423</td>
<td>57.31634</td>
<td>65.063</td>
<td>73.67424</td>
<td>79.7913</td>
<td>84.23741</td>
</tr>
<tr>
<th scope="row">183.5</th>
<td>42.63058</td>
<td>44.13638</td>
<td>46.63815</td>
<td>51.39346</td>
<td>57.72139</td>
<td>65.48919</td>
<td>74.12736</td>
<td>80.26632</td>
<td>84.73</td>
</tr>
<tr>
<th scope="row">184.5</th>
<td>42.99612</td>
<td>44.50523</td>
<td>47.01247</td>
<td>51.77827</td>
<td>58.121</td>
<td>65.90932</td>
<td>74.57462</td>
<td>80.73625</td>
<td>85.21839</td>
</tr>
<tr>
<th scope="row">185.5</th>
<td>43.35899</td>
<td>44.87102</td>
<td>47.3831</td>
<td>52.15839</td>
<td>58.51492</td>
<td>66.32318</td>
<td>75.01586</td>
<td>81.20093</td>
<td>85.70242</td>
</tr>
<tr>
<th scope="row">186.5</th>
<td>43.71882</td>
<td>45.23338</td>
<td>47.74972</td>
<td>52.53352</td>
<td>58.90293</td>
<td>66.73059</td>
<td>75.4509</td>
<td>81.66019</td>
<td>86.18192</td>
</tr>
<tr>
<th scope="row">187.5</th>
<td>44.07523</td>
<td>45.59196</td>
<td>48.11199</td>
<td>52.90339</td>
<td>59.2848</td>
<td>67.13136</td>
<td>75.87959</td>
<td>82.11386</td>
<td>86.65673</td>
</tr>
<tr>
<th scope="row">188.5</th>
<td>44.42784</td>
<td>45.9464</td>
<td>48.46959</td>
<td>53.26773</td>
<td>59.66033</td>
<td>67.52534</td>
<td>76.30176</td>
<td>82.56177</td>
<td>87.12663</td>
</tr>
<tr>
<th scope="row">189.5</th>
<td>44.77629</td>
<td>46.29635</td>
<td>48.82222</td>
<td>53.6263</td>
<td>60.02932</td>
<td>67.91236</td>
<td>76.71726</td>
<td>83.00375</td>
<td>87.59143</td>
</tr>
<tr>
<th scope="row">190.5</th>
<td>45.1202</td>
<td>46.64147</td>
<td>49.16956</td>
<td>53.97886</td>
<td>60.39159</td>
<td>68.29229</td>
<td>77.12595</td>
<td>83.43962</td>
<td>88.05093</td>
</tr>
<tr>
<th scope="row">191.5</th>
<td>45.45922</td>
<td>46.98144</td>
<td>49.51134</td>
<td>54.32518</td>
<td>60.74699</td>
<td>68.665</td>
<td>77.52768</td>
<td>83.8692</td>
<td>88.50487</td>
</tr>
<tr>
<th scope="row">192.5</th>
<td>45.79301</td>
<td>47.31593</td>
<td>49.84727</td>
<td>54.66505</td>
<td>61.09537</td>
<td>69.03038</td>
<td>77.92233</td>
<td>84.29229</td>
<td>88.95303</td>
</tr>
<tr>
<th scope="row">193.5</th>
<td>46.12122</td>
<td>47.64464</td>
<td>50.17709</td>
<td>54.99828</td>
<td>61.4366</td>
<td>69.38833</td>
<td>78.30977</td>
<td>84.70871</td>
<td>89.39516</td>
</tr>
<tr>
<th scope="row">194.5</th>
<td>46.44354</td>
<td>47.96727</td>
<td>50.50055</td>
<td>55.3247</td>
<td>61.77057</td>
<td>69.73878</td>
<td>78.68987</td>
<td>85.11828</td>
<td>89.83098</td>
</tr>
<tr>
<th scope="row">195.5</th>
<td>46.75967</td>
<td>48.28356</td>
<td>50.81743</td>
<td>55.64414</td>
<td>62.09719</td>
<td>70.08164</td>
<td>79.06252</td>
<td>85.5208</td>
<td>90.26024</td>
</tr>
<tr>
<th scope="row">196.5</th>
<td>47.06932</td>
<td>48.59325</td>
<td>51.12752</td>
<td>55.95647</td>
<td>62.41639</td>
<td>70.41688</td>
<td>79.42763</td>
<td>85.91607</td>
<td>90.68264</td>
</tr>
<tr>
<th scope="row">197.5</th>
<td>47.37223</td>
<td>48.89609</td>
<td>51.43062</td>
<td>56.26158</td>
<td>62.72809</td>
<td>70.74445</td>
<td>79.78509</td>
<td>86.30392</td>
<td>91.0979</td>
</tr>
<tr>
<th scope="row">198.5</th>
<td>47.66815</td>
<td>49.19189</td>
<td>51.72656</td>
<td>56.55935</td>
<td>63.03228</td>
<td>71.06433</td>
<td>80.13483</td>
<td>86.68415</td>
<td>91.50571</td>
</tr>
<tr>
<th scope="row">199.5</th>
<td>47.95687</td>
<td>49.48044</td>
<td>52.0152</td>
<td>56.84971</td>
<td>63.32892</td>
<td>71.37652</td>
<td>80.47676</td>
<td>87.05657</td>
<td>91.90578</td>
</tr>
<tr>
<th scope="row">200.5</th>
<td>48.23819</td>
<td>49.76158</td>
<td>52.29642</td>
<td>57.13261</td>
<td>63.61802</td>
<td>71.68103</td>
<td>80.81082</td>
<td>87.42099</td>
<td>92.29779</td>
</tr>
<tr>
<th scope="row">201.5</th>
<td>48.51195</td>
<td>50.03518</td>
<td>52.57011</td>
<td>57.408</td>
<td>63.89959</td>
<td>71.97788</td>
<td>81.13696</td>
<td>87.77725</td>
<td>92.68144</td>
</tr>
<tr>
<th scope="row">202.5</th>
<td>48.778</td>
<td>50.30112</td>
<td>52.8362</td>
<td>57.67589</td>
<td>64.17367</td>
<td>72.26711</td>
<td>81.45512</td>
<td>88.12516</td>
<td>93.05643</td>
</tr>
<tr>
<th scope="row">203.5</th>
<td>49.03625</td>
<td>50.55931</td>
<td>53.09465</td>
<td>57.93627</td>
<td>64.44032</td>
<td>72.54879</td>
<td>81.76528</td>
<td>88.46456</td>
<td>93.42244</td>
</tr>
<tr>
<th scope="row">204.5</th>
<td>49.28662</td>
<td>50.80971</td>
<td>53.34544</td>
<td>58.18918</td>
<td>64.69961</td>
<td>72.82297</td>
<td>82.06741</td>
<td>88.79528</td>
<td>93.77917</td>
</tr>
<tr>
<th scope="row">205.5</th>
<td>49.52905</td>
<td>51.05229</td>
<td>53.58858</td>
<td>58.43468</td>
<td>64.95165</td>
<td>73.08975</td>
<td>82.3615</td>
<td>89.11718</td>
<td>94.12633</td>
</tr>
<tr>
<th scope="row">206.5</th>
<td>49.76354</td>
<td>51.28706</td>
<td>53.82409</td>
<td>58.67285</td>
<td>65.19653</td>
<td>73.34922</td>
<td>82.64755</td>
<td>89.43011</td>
<td>94.46364</td>
</tr>
<tr>
<th scope="row">207.5</th>
<td>49.9901</td>
<td>51.51404</td>
<td>54.05205</td>
<td>58.9038</td>
<td>65.4344</td>
<td>73.60152</td>
<td>82.92558</td>
<td>89.73396</td>
<td>94.79081</td>
</tr>
<tr>
<th scope="row">208.5</th>
<td>50.2088</td>
<td>51.73333</td>
<td>54.27255</td>
<td>59.12764</td>
<td>65.6654</td>
<td>73.84675</td>
<td>83.1956</td>
<td>90.02861</td>
<td>95.10761</td>
</tr>
<tr>
<th scope="row">209.5</th>
<td>50.4197</td>
<td>51.94499</td>
<td>54.4857</td>
<td>59.34454</td>
<td>65.8897</td>
<td>74.08507</td>
<td>83.45768</td>
<td>90.31396</td>
<td>95.41379</td>
</tr>
<tr>
<th scope="row">210.5</th>
<td>50.62293</td>
<td>52.14918</td>
<td>54.69165</td>
<td>59.55466</td>
<td>66.10749</td>
<td>74.31664</td>
<td>83.71185</td>
<td>90.58994</td>
<td>95.70913</td>
</tr>
<tr>
<th scope="row">211.5</th>
<td>50.81862</td>
<td>52.34603</td>
<td>54.89058</td>
<td>59.75819</td>
<td>66.31897</td>
<td>74.54164</td>
<td>83.9582</td>
<td>90.85649</td>
<td>95.99346</td>
</tr>
<tr>
<th scope="row">212.5</th>
<td>51.00695</td>
<td>52.53572</td>
<td>55.08267</td>
<td>59.95536</td>
<td>66.52437</td>
<td>74.76024</td>
<td>84.19682</td>
<td>91.11358</td>
<td>96.26661</td>
</tr>
<tr>
<th scope="row">213.5</th>
<td>51.18811</td>
<td>52.71847</td>
<td>55.26814</td>
<td>60.14639</td>
<td>66.7239</td>
<td>74.97267</td>
<td>84.42781</td>
<td>91.3612</td>
<td>96.52847</td>
</tr>
<tr>
<th scope="row">214.5</th>
<td>51.36232</td>
<td>52.8945</td>
<td>55.44723</td>
<td>60.33153</td>
<td>66.91784</td>
<td>75.17912</td>
<td>84.6513</td>
<td>91.59938</td>
<td>96.77894</td>
</tr>
<tr>
<th scope="row">215.5</th>
<td>51.52982</td>
<td>53.06406</td>
<td>55.6202</td>
<td>60.51105</td>
<td>67.10642</td>
<td>75.37983</td>
<td>84.86744</td>
<td>91.82817</td>
<td>97.01799</td>
</tr>
<tr>
<th scope="row">216.5</th>
<td>51.69086</td>
<td>53.2274</td>
<td>55.78731</td>
<td>60.68521</td>
<td>67.28993</td>
<td>75.57503</td>
<td>85.0764</td>
<td>92.04765</td>
<td>97.24564</td>
</tr>
<tr>
<th scope="row">217.5</th>
<td>51.84574</td>
<td>53.38481</td>
<td>55.94884</td>
<td>60.85431</td>
<td>67.46863</td>
<td>75.76499</td>
<td>85.27837</td>
<td>92.25795</td>
<td>97.46194</td>
</tr>
<tr>
<th scope="row">218.5</th>
<td>51.99472</td>
<td>53.53657</td>
<td>56.10508</td>
<td>61.01862</td>
<td>67.64281</td>
<td>75.94994</td>
<td>85.47356</td>
<td>92.45925</td>
<td>97.66704</td>
</tr>
<tr>
<th scope="row">219.5</th>
<td>52.13808</td>
<td>53.68296</td>
<td>56.25633</td>
<td>61.17846</td>
<td>67.81277</td>
<td>76.13018</td>
<td>85.66221</td>
<td>92.65175</td>
<td>97.86111</td>
</tr>
<tr>
<th scope="row">220.5</th>
<td>52.27612</td>
<td>53.82428</td>
<td>56.40286</td>
<td>61.33409</td>
<td>67.97877</td>
<td>76.30597</td>
<td>85.8446</td>
<td>92.83572</td>
<td>98.04443</td>
</tr>
<tr>
<th scope="row">221.5</th>
<td>52.40911</td>
<td>53.96079</td>
<td>56.54495</td>
<td>61.4858</td>
<td>68.14111</td>
<td>76.47759</td>
<td>86.02101</td>
<td>93.01148</td>
<td>98.21733</td>
</tr>
<tr>
<th scope="row">222.5</th>
<td>52.53731</td>
<td>54.09278</td>
<td>56.68288</td>
<td>61.63386</td>
<td>68.30005</td>
<td>76.64533</td>
<td>86.19177</td>
<td>93.17941</td>
<td>98.38026</td>
</tr>
<tr>
<th scope="row">223.5</th>
<td>52.66098</td>
<td>54.22046</td>
<td>56.81689</td>
<td>61.77851</td>
<td>68.45585</td>
<td>76.80948</td>
<td>86.35725</td>
<td>93.33994</td>
<td>98.53375</td>
</tr>
<tr>
<th scope="row">224.5</th>
<td>52.78032</td>
<td>54.34408</td>
<td>56.94719</td>
<td>61.91997</td>
<td>68.60872</td>
<td>76.97031</td>
<td>86.51781</td>
<td>93.49361</td>
<td>98.67844</td>
</tr>
<tr>
<th scope="row">225.5</th>
<td>52.89553</td>
<td>54.46381</td>
<td>57.07396</td>
<td>62.05842</td>
<td>68.75889</td>
<td>77.12809</td>
<td>86.6739</td>
<td>93.64099</td>
<td>98.81509</td>
</tr>
<tr>
<th scope="row">226.5</th>
<td>53.00674</td>
<td>54.57977</td>
<td>57.19732</td>
<td>62.19399</td>
<td>68.90653</td>
<td>77.2831</td>
<td>86.82597</td>
<td>93.78276</td>
<td>98.94455</td>
</tr>
<tr>
<th scope="row">227.5</th>
<td>53.11402</td>
<td>54.69205</td>
<td>57.31737</td>
<td>62.32678</td>
<td>69.05176</td>
<td>77.4356</td>
<td>86.97452</td>
<td>93.91968</td>
<td>99.06786</td>
</tr>
<tr>
<th scope="row">228.5</th>
<td>53.21739</td>
<td>54.80066</td>
<td>57.43409</td>
<td>62.4568</td>
<td>69.19467</td>
<td>77.5858</td>
<td>87.12008</td>
<td>94.05261</td>
<td>99.18615</td>
</tr>
<tr>
<th scope="row">229.5</th>
<td>53.31679</td>
<td>54.90552</td>
<td>57.54742</td>
<td>62.58399</td>
<td>69.33527</td>
<td>77.73392</td>
<td>87.26324</td>
<td>94.18252</td>
<td>99.30075</td>
</tr>
<tr>
<th scope="row">230.5</th>
<td>53.41207</td>
<td>55.00648</td>
<td>57.6572</td>
<td>62.70822</td>
<td>69.47351</td>
<td>77.88014</td>
<td>87.40462</td>
<td>94.31046</td>
<td>99.41315</td>
</tr>
<tr>
<th scope="row">231.5</th>
<td>53.50297</td>
<td>55.10328</td>
<td>57.76315</td>
<td>62.82922</td>
<td>69.60926</td>
<td>78.02461</td>
<td>87.54488</td>
<td>94.43765</td>
<td>99.52501</td>
</tr>
<tr>
<th scope="row">232.5</th>
<td>53.58913</td>
<td>55.19552</td>
<td>57.86488</td>
<td>62.94664</td>
<td>69.74228</td>
<td>78.16742</td>
<td>87.68474</td>
<td>94.5654</td>
<td>99.63819</td>
</tr>
<tr>
<th scope="row">233.5</th>
<td>53.67003</td>
<td>55.2827</td>
<td>57.96187</td>
<td>63.06</td>
<td>69.87224</td>
<td>78.30863</td>
<td>87.82495</td>
<td>94.69517</td>
<td>99.75477</td>
</tr>
<tr>
<th scope="row">234.5</th>
<td>53.74501</td>
<td>55.36413</td>
<td>58.05343</td>
<td>63.16863</td>
<td>69.99869</td>
<td>78.44824</td>
<td>87.96634</td>
<td>94.82857</td>
<td>99.87706</td>
</tr>
<tr>
<th scope="row">235.5</th>
<td>53.81325</td>
<td>55.43897</td>
<td>58.13869</td>
<td>63.27175</td>
<td>70.12104</td>
<td>78.58618</td>
<td>88.10976</td>
<td>94.96735</td>
<td>100.0076</td>
</tr>
<tr>
<th scope="row">236.5</th>
<td>53.87373</td>
<td>55.50617</td>
<td>58.21662</td>
<td>63.36835</td>
<td>70.23857</td>
<td>78.72234</td>
<td>88.25614</td>
<td>95.11344</td>
<td>100.1492</td>
</tr>
<tr>
<th scope="row">237.5</th>
<td>53.92519</td>
<td>55.56447</td>
<td>58.28594</td>
<td>63.45727</td>
<td>70.3504</td>
<td>78.8565</td>
<td>88.40645</td>
<td>95.26894</td>
<td>100.3048</td>
</tr>
<tr>
<th scope="row">238.5</th>
<td>53.96614</td>
<td>55.61236</td>
<td>58.34515</td>
<td>63.53709</td>
<td>70.45546</td>
<td>78.98839</td>
<td>88.56175</td>
<td>95.43613</td>
<td>100.4779</td>
</tr>
<tr>
<th scope="row">239.5</th>
<td>53.99482</td>
<td>55.64807</td>
<td>58.39247</td>
<td>63.60618</td>
<td>70.55252</td>
<td>79.11762</td>
<td>88.72311</td>
<td>95.61749</td>
<td>100.6721</td>
</tr>
<tr>
<th scope="row">240</th>
<td>54.00392</td>
<td>55.66071</td>
<td>58.41105</td>
<td>63.63611</td>
<td>70.59761</td>
<td>79.18111</td>
<td>88.80644</td>
<td>95.71431</td>
<td>100.7784</td>
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

