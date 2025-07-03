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

<tr>	<th>	0	</th>	<td>	11.2	</td>	<td>	11.5	</td>	<td>	11.85	</td>				<td>	12.5	</td>	<td>	13.3	</td>	<td>	14.2	</td>	<td>	14.7	</td>	<td>	15.15	</td>	<td>	15.5	</td>	<td>	15.9	</td>	</tr>
<tr>	<th>	1	</th>	<td>	12.1	</td>	<td>	12.4	</td>	<td>	12.75	</td>				<td>	13.6	</td>	<td>	14.6	</td>	<td>	15.5	</td>	<td>	16.1	</td>	<td>	16.55	</td>	<td>	17.0	</td>	<td>	17.3	</td>	</tr>
<tr>	<th>	2	</th>	<td>	13.2	</td>	<td>	13.5	</td>	<td>	13.85	</td>				<td>	14.8	</td>	<td>	15.8	</td>	<td>	16.8	</td>	<td>	17.4	</td>	<td>	17.85	</td>	<td>	18.4	</td>	<td>	18.8	</td>	</tr>
<tr>	<th>	3	</th>	<td>	13.7	</td>	<td>	14.0	</td>	<td>	14.35	</td>				<td>	15.4	</td>	<td>	16.4	</td>	<td>	17.4	</td>	<td>	18.0	</td>	<td>	18.45	</td>	<td>	19.0	</td>	<td>	19.4	</td>	</tr>
<tr>	<th>	4	</th>	<td>	14.0	</td>	<td>	14.3	</td>	<td>	14.65	</td>				<td>	15.7	</td>	<td>	16.7	</td>	<td>	17.7	</td>	<td>	18.3	</td>	<td>	18.75	</td>	<td>	19.4	</td>	<td>	19.8	</td>	</tr>
<tr>	<th>	5	</th>	<td>	14.2	</td>	<td>	14.5	</td>	<td>	14.85	</td>				<td>	15.8	</td>	<td>	16.8	</td>	<td>	17.9	</td>	<td>	18.5	</td>	<td>	18.95	</td>	<td>	19.6	</td>	<td>	20.0	</td>	</tr>
<tr>	<th>	6	</th>	<td>	14.3	</td>	<td>	14.6	</td>	<td>	14.95	</td>				<td>	15.9	</td>	<td>	16.9	</td>	<td>	18.0	</td>	<td>	18.6	</td>	<td>	19.05	</td>	<td>	19.6	</td>	<td>	20.1	</td>	</tr>
<tr>	<th>	7	</th>	<td>	14.3	</td>	<td>	14.6	</td>	<td>	14.95	</td>				<td>	15.9	</td>	<td>	16.9	</td>	<td>	18.0	</td>	<td>	18.6	</td>	<td>	19.05	</td>	<td>	19.6	</td>	<td>	20.1	</td>	</tr>
<tr>	<th>	8	</th>	<td>	14.3	</td>	<td>	14.6	</td>	<td>	14.95	</td>				<td>	15.9	</td>	<td>	16.8	</td>	<td>	17.9	</td>	<td>	18.5	</td>	<td>	18.95	</td>	<td>	19.6	</td>	<td>	20.0	</td>	</tr>
<tr>	<th>	9	</th>	<td>	14.2	</td>	<td>	14.5	</td>	<td>	14.85	</td>				<td>	15.8	</td>	<td>	16.7	</td>	<td>	17.8	</td>	<td>	18.4	</td>	<td>	18,85	</td>	<td>	19.4	</td>	<td>	19.9	</td>	</tr>
<tr>	<th>	10	</th>	<td>	14.1	</td>	<td>	14.4	</td>	<td>	14.75	</td>				<td>	15.7	</td>	<td>	16.6	</td>	<td>	17.7	</td>	<td>	18.2	</td>	<td>	18.65	</td>	<td>	19.3	</td>	<td>	19.7	</td>	</tr>
<tr>	<th>	11	</th>	<td>	14.0	</td>	<td>	14.3	</td>	<td>	14.65	</td>				<td>	15.5	</td>	<td>	16.5	</td>	<td>	17.5	</td>	<td>	18.1	</td>	<td>	18.55	</td>	<td>	19.1	</td>	<td>	19.6	</td>	</tr>
<tr>	<th>	12	</th>	<td>	13.9	</td>	<td>	14.2	</td>	<td>	14.55	</td>				<td>	15.4	</td>	<td>	16.4	</td>	<td>	17.4	</td>	<td>	17.9	</td>	<td>	18.35	</td>	<td>	19.0	</td>	<td>	19.4	</td>	</tr>
<tr>	<th>	13	</th>	<td>	13.8	</td>	<td>	14.1	</td>	<td>	14.45	</td>				<td>	15.3	</td>	<td>	16.2	</td>	<td>	17.2	</td>	<td>	17.8	</td>	<td>	18.25	</td>	<td>	18.8	</td>	<td>	19.2	</td>	</tr>
<tr>	<th>	14	</th>	<td>	13.7	</td>	<td>	14.0	</td>	<td>	14.35	</td>				<td>	15.2	</td>	<td>	16.1	</td>	<td>	17.1	</td>	<td>	17.7	</td>	<td>	18.15	</td>	<td>	18.7	</td>	<td>	19.1	</td>	</tr>
<tr>	<th>	15	</th>	<td>	13.7	</td>	<td>	13.9	</td>	<td>	14.25	</td>				<td>	15.1	</td>	<td>	16.0	</td>	<td>	17.0	</td>	<td>	17.5	</td>	<td>	17.95	</td>	<td>	18.6	</td>	<td>	19.0	</td>	</tr>
<tr>	<th>	16	</th>	<td>	13.6	</td>	<td>	13.8	</td>	<td>	14.15	</td>				<td>	15.0	</td>	<td>	15.9	</td>	<td>	16.9	</td>	<td>	17.4	</td>	<td>	17.85	</td>	<td>	18.4	</td>	<td>	18.8	</td>	</tr>
<tr>	<th>	17	</th>	<td>	13.5	</td>	<td>	13.8	</td>	<td>	14.15	</td>				<td>	14.9	</td>	<td>	15.8	</td>	<td>	16.8	</td>	<td>	17.3	</td>	<td>	17.75	</td>	<td>	18.3	</td>	<td>	18.7	</td>	</tr>
<tr>	<th>	18	</th>	<td>	13.4	</td>	<td>	13.7	</td>	<td>	14.05	</td>				<td>	14.8	</td>	<td>	15.7	</td>	<td>	16.7	</td>	<td>	17.2	</td>	<td>	17.65	</td>	<td>	18.2	</td>	<td>	18.6	</td>	</tr>
<tr>	<th>	19	</th>	<td>	13.4	</td>	<td>	13.6	</td>	<td>	13.95	</td>				<td>	14.8	</td>	<td>	15.7	</td>	<td>	16.6	</td>	<td>	17.2	</td>	<td>	17.65	</td>	<td>	18.1	</td>	<td>	18.5	</td>	</tr>
<tr>	<th>	20	</th>	<td>	13.3	</td>	<td>	13.6	</td>	<td>	13.95	</td>				<td>	14.7	</td>	<td>	15.6	</td>	<td>	16.5	</td>	<td>	17.1	</td>	<td>	17.55	</td>	<td>	18.1	</td>	<td>	18.5	</td>	</tr>
<tr>	<th>	21	</th>	<td>	13.3	</td>	<td>	13.6	</td>	<td>	13.95	</td>				<td>	14.7	</td>	<td>	15.5	</td>	<td>	16.5	</td>	<td>	17.0	</td>	<td>	17.45	</td>	<td>	18.0	</td>	<td>	18.4	</td>	</tr>
<tr>	<th>	22	</th>	<td>	13.3	</td>	<td>	13.5	</td>	<td>	13.85	</td>				<td>	14.6	</td>	<td>	15.5	</td>	<td>	16.4	</td>	<td>	17.0	</td>	<td>	17.45	</td>	<td>	17.9	</td>	<td>	18.3	</td>	</tr>
<tr>	<th>	23	</th>	<td>	13.2	</td>	<td>	13.5	</td>	<td>	13.85	</td>				<td>	14.6	</td>	<td>	15.4	</td>	<td>	16.4	</td>	<td>	16.9	</td>	<td>	17.35	</td>	<td>	17.9	</td>	<td>	18.3	</td>	</tr>

<th scope="row">24</th>
<td align="right">14.14735</td>
<td align="right">14.39787</td>
<td align="right">14.80134</td>
<td align="right">15.52808</td>
<td align="right">16.4234</td>
<td align="right">17.42746</td>
<td align="right">18.01821</td>
<td align="right">18.44139</td>
<td align="right">19.10624</td>
<td align="right">19.56411</td>
</tr>
<tr>
<th scope="row">24.5</th>
<td align="right">14.13226</td>
<td align="right">14.38019</td>
<td align="right">14.77965</td>
<td align="right">15.49976</td>
<td align="right">16.38804</td>
<td align="right">17.38582</td>
<td align="right">17.97371</td>
<td align="right">18.39526</td>
<td align="right">19.05824</td>
<td align="right">19.51534</td>
</tr>
<tr>
<th scope="row">25.5</th>
<td align="right">14.10241</td>
<td align="right">14.34527</td>
<td align="right">14.73695</td>
<td align="right">15.44422</td>
<td align="right">16.31897</td>
<td align="right">17.30485</td>
<td align="right">17.88749</td>
<td align="right">18.30611</td>
<td align="right">18.96595</td>
<td align="right">19.42198</td>
</tr>
<tr>
<th scope="row">26.5</th>
<td align="right">14.07297</td>
<td align="right">14.31097</td>
<td align="right">14.69516</td>
<td align="right">15.39015</td>
<td align="right">16.25208</td>
<td align="right">17.22693</td>
<td align="right">17.80489</td>
<td align="right">18.22103</td>
<td align="right">18.87853</td>
<td align="right">19.3341</td>
</tr>
<tr>
<th scope="row">27.5</th>
<td align="right">14.04396</td>
<td align="right">14.27728</td>
<td align="right">14.65429</td>
<td align="right">15.33754</td>
<td align="right">16.18735</td>
<td align="right">17.15202</td>
<td align="right">17.72586</td>
<td align="right">18.13997</td>
<td align="right">18.79591</td>
<td align="right">19.25163</td>
</tr>
<tr>
<th scope="row">28.5</th>
<td align="right">14.01538</td>
<td align="right">14.2442</td>
<td align="right">14.61434</td>
<td align="right">15.2864</td>
<td align="right">16.12475</td>
<td align="right">17.08009</td>
<td align="right">17.65035</td>
<td align="right">18.06285</td>
<td align="right">18.718</td>
<td align="right">19.17448</td>
</tr>
<tr>
<th scope="row">29.5</th>
<td align="right">13.98723</td>
<td align="right">14.21175</td>
<td align="right">14.57531</td>
<td align="right">15.23671</td>
<td align="right">16.06429</td>
<td align="right">17.01107</td>
<td align="right">17.5783</td>
<td align="right">17.98962</td>
<td align="right">18.64472</td>
<td align="right">19.10255</td>
</tr>
<tr>
<th scope="row">30.5</th>
<td align="right">13.9595</td>
<td align="right">14.17992</td>
<td align="right">14.5372</td>
<td align="right">15.18848</td>
<td align="right">16.00593</td>
<td align="right">16.94495</td>
<td align="right">17.50965</td>
<td align="right">17.92019</td>
<td align="right">18.57599</td>
<td align="right">19.03578</td>
</tr>
<tr>
<th scope="row">31.5</th>
<td align="right">13.93221</td>
<td align="right">14.14871</td>
<td align="right">14.50003</td>
<td align="right">15.14171</td>
<td align="right">15.94967</td>
<td align="right">16.88168</td>
<td align="right">17.44435</td>
<td align="right">17.85452</td>
<td align="right">18.51173</td>
<td align="right">18.97407</td>
</tr>
<tr>
<th scope="row">32.5</th>
<td align="right">13.90536</td>
<td align="right">14.11813</td>
<td align="right">14.46378</td>
<td align="right">15.09638</td>
<td align="right">15.89548</td>
<td align="right">16.82123</td>
<td align="right">17.38235</td>
<td align="right">17.79253</td>
<td align="right">18.45187</td>
<td align="right">18.91733</td>
</tr>
<tr>
<th scope="row">33.5</th>
<td align="right">13.87893</td>
<td align="right">14.08818</td>
<td align="right">14.42846</td>
<td align="right">15.0525</td>
<td align="right">15.84336</td>
<td align="right">16.76355</td>
<td align="right">17.3236</td>
<td align="right">17.73416</td>
<td align="right">18.39632</td>
<td align="right">18.86548</td>
</tr>
<tr>
<th scope="row">34.5</th>
<td align="right">13.85295</td>
<td align="right">14.05885</td>
<td align="right">14.39406</td>
<td align="right">15.01007</td>
<td align="right">15.79329</td>
<td align="right">16.70862</td>
<td align="right">17.26804</td>
<td align="right">17.67936</td>
<td align="right">18.345</td>
<td align="right">18.81843</td>
</tr>
<tr>
<th scope="row">35.5</th>
<td align="right">13.82741</td>
<td align="right">14.03016</td>
<td align="right">14.3606</td>
<td align="right">14.96907</td>
<td align="right">15.74526</td>
<td align="right">16.65641</td>
<td align="right">17.21564</td>
<td align="right">17.62805</td>
<td align="right">18.29784</td>
<td align="right">18.77609</td>
</tr>
<tr>
<th scope="row">36.5</th>
<td align="right">13.8023</td>
<td align="right">14.00209</td>
<td align="right">14.32806</td>
<td align="right">14.9295</td>
<td align="right">15.69924</td>
<td align="right">16.60687</td>
<td align="right">17.16634</td>
<td align="right">17.58019</td>
<td align="right">18.25475</td>
<td align="right">18.73838</td>
</tr>
<tr>
<th scope="row">37.5</th>
<td align="right">13.77763</td>
<td align="right">13.97466</td>
<td align="right">14.29645</td>
<td align="right">14.89136</td>
<td align="right">15.65523</td>
<td align="right">16.55998</td>
<td align="right">17.12009</td>
<td align="right">17.53571</td>
<td align="right">18.21567</td>
<td align="right">18.7052</td>
</tr>
<tr>
<th scope="row">38.5</th>
<td align="right">13.75341</td>
<td align="right">13.94786</td>
<td align="right">14.26576</td>
<td align="right">14.85465</td>
<td align="right">15.61321</td>
<td align="right">16.5157</td>
<td align="right">17.07685</td>
<td align="right">17.49455</td>
<td align="right">18.18051</td>
<td align="right">18.67647</td>
</tr>
<tr>
<th scope="row">39.5</th>
<td align="right">13.72964</td>
<td align="right">13.92169</td>
<td align="right">14.23599</td>
<td align="right">14.81934</td>
<td align="right">15.57317</td>
<td align="right">16.474</td>
<td align="right">17.03658</td>
<td align="right">17.45667</td>
<td align="right">18.14919</td>
<td align="right">18.6521</td>
</tr>
<tr>
<th scope="row">40.5</th>
<td align="right">13.70631</td>
<td align="right">13.89615</td>
<td align="right">14.20714</td>
<td align="right">14.78544</td>
<td align="right">15.53508</td>
<td align="right">16.43486</td>
<td align="right">16.99923</td>
<td align="right">17.422</td>
<td align="right">18.12165</td>
<td align="right">18.632</td>
</tr>
<tr>
<th scope="row">41.5</th>
<td align="right">13.68343</td>
<td align="right">13.87124</td>
<td align="right">14.1792</td>
<td align="right">14.75293</td>
<td align="right">15.49893</td>
<td align="right">16.39824</td>
<td align="right">16.96476</td>
<td align="right">17.39049</td>
<td align="right">18.09781</td>
<td align="right">18.61608</td>
</tr>
<tr>
<th scope="row">42.5</th>
<td align="right">13.66101</td>
<td align="right">13.84697</td>
<td align="right">14.15218</td>
<td align="right">14.7218</td>
<td align="right">15.4647</td>
<td align="right">16.36411</td>
<td align="right">16.93312</td>
<td align="right">17.3621</td>
<td align="right">18.07759</td>
<td align="right">18.60425</td>
</tr>
<tr>
<th scope="row">43.5</th>
<td align="right">13.63905</td>
<td align="right">13.82333</td>
<td align="right">14.12606</td>
<td align="right">14.69205</td>
<td align="right">15.43238</td>
<td align="right">16.33244</td>
<td align="right">16.90428</td>
<td align="right">17.33676</td>
<td align="right">18.06093</td>
<td align="right">18.59643</td>
</tr>
<tr>
<th scope="row">44.5</th>
<td align="right">13.61756</td>
<td align="right">13.80033</td>
<td align="right">14.10084</td>
<td align="right">14.66365</td>
<td align="right">15.40193</td>
<td align="right">16.3032</td>
<td align="right">16.8782</td>
<td align="right">17.31442</td>
<td align="right">18.04775</td>
<td align="right">18.59253</td>
</tr>
<tr>
<th scope="row">45.5</th>
<td align="right">13.59654</td>
<td align="right">13.77796</td>
<td align="right">14.07653</td>
<td align="right">14.63661</td>
<td align="right">15.37335</td>
<td align="right">16.27636</td>
<td align="right">16.85483</td>
<td align="right">17.29505</td>
<td align="right">18.03799</td>
<td align="right">18.59246</td>
</tr>
<tr>
<th scope="row">46.5</th>
<td align="right">13.57599</td>
<td align="right">13.75624</td>
<td align="right">14.05311</td>
<td align="right">14.61091</td>
<td align="right">15.34661</td>
<td align="right">16.25188</td>
<td align="right">16.83413</td>
<td align="right">17.27858</td>
<td align="right">18.03158</td>
<td align="right">18.59614</td>
</tr>
<tr>
<th scope="row">47.5</th>
<td align="right">13.55592</td>
<td align="right">13.73516</td>
<td align="right">14.03059</td>
<td align="right">14.58652</td>
<td align="right">15.32168</td>
<td align="right">16.22973</td>
<td align="right">16.81606</td>
<td align="right">17.26497</td>
<td align="right">18.02844</td>
<td align="right">18.60348</td>
</tr>
<tr>
<th scope="row">48.5</th>
<td align="right">13.53635</td>
<td align="right">13.71472</td>
<td align="right">14.00895</td>
<td align="right">14.56345</td>
<td align="right">15.29855</td>
<td align="right">16.20988</td>
<td align="right">16.80058</td>
<td align="right">17.25417</td>
<td align="right">18.02851</td>
<td align="right">18.61441</td>
</tr>
<tr>
<th scope="row">49.5</th>
<td align="right">13.51728</td>
<td align="right">13.69493</td>
<td align="right">13.9882</td>
<td align="right">14.54167</td>
<td align="right">15.27719</td>
<td align="right">16.19229</td>
<td align="right">16.78765</td>
<td align="right">17.24613</td>
<td align="right">18.03174</td>
<td align="right">18.62883</td>
</tr>
<tr>
<th scope="row">50.5</th>
<td align="right">13.4987</td>
<td align="right">13.67579</td>
<td align="right">13.96833</td>
<td align="right">14.52117</td>
<td align="right">15.25757</td>
<td align="right">16.17693</td>
<td align="right">16.77723</td>
<td align="right">17.24081</td>
<td align="right">18.03805</td>
<td align="right">18.64667</td>
</tr>
<tr>
<th scope="row">51.5</th>
<td align="right">13.48065</td>
<td align="right">13.65731</td>
<td align="right">13.94933</td>
<td align="right">14.50194</td>
<td align="right">15.23967</td>
<td align="right">16.16378</td>
<td align="right">16.76927</td>
<td align="right">17.23815</td>
<td align="right">18.04738</td>
<td align="right">18.66785</td>
</tr>
<tr>
<th scope="row">52.5</th>
<td align="right">13.46311</td>
<td align="right">13.63948</td>
<td align="right">13.93121</td>
<td align="right">14.48396</td>
<td align="right">15.22347</td>
<td align="right">16.15278</td>
<td align="right">16.76375</td>
<td align="right">17.23811</td>
<td align="right">18.05967</td>
<td align="right">18.69229</td>
</tr>
<tr>
<th scope="row">53.5</th>
<td align="right">13.4461</td>
<td align="right">13.62231</td>
<td align="right">13.91396</td>
<td align="right">14.46721</td>
<td align="right">15.20894</td>
<td align="right">16.14391</td>
<td align="right">16.7606</td>
<td align="right">17.24065</td>
<td align="right">18.07486</td>
<td align="right">18.71992</td>
</tr>
<tr>
<th scope="row">54.5</th>
<td align="right">13.42963</td>
<td align="right">13.6058</td>
<td align="right">13.89757</td>
<td align="right">14.45169</td>
<td align="right">15.19606</td>
<td align="right">16.13714</td>
<td align="right">16.75981</td>
<td align="right">17.24571</td>
<td align="right">18.09289</td>
<td align="right">18.75065</td>
</tr>
<tr>
<th scope="row">55.5</th>
<td align="right">13.4137</td>
<td align="right">13.58997</td>
<td align="right">13.88205</td>
<td align="right">14.43738</td>
<td align="right">15.1848</td>
<td align="right">16.13242</td>
<td align="right">16.76132</td>
<td align="right">17.25326</td>
<td align="right">18.1137</td>
<td align="right">18.78441</td>
</tr>
<tr>
<th scope="row">56.5</th>
<td align="right">13.39833</td>
<td align="right">13.5748</td>
<td align="right">13.86739</td>
<td align="right">14.42427</td>
<td align="right">15.17513</td>
<td align="right">16.12972</td>
<td align="right">16.76509</td>
<td align="right">17.26324</td>
<td align="right">18.13722</td>
<td align="right">18.82113</td>
</tr>
<tr>
<th scope="row">57.5</th>
<td align="right">13.38352</td>
<td align="right">13.56031</td>
<td align="right">13.85358</td>
<td align="right">14.41233</td>
<td align="right">15.16703</td>
<td align="right">16.12901</td>
<td align="right">16.77108</td>
<td align="right">17.2756</td>
<td align="right">18.16341</td>
<td align="right">18.86074</td>
</tr>
<tr>
<th scope="row">58.5</th>
<td align="right">13.36927</td>
<td align="right">13.54649</td>
<td align="right">13.84062</td>
<td align="right">14.40156</td>
<td align="right">15.16047</td>
<td align="right">16.13025</td>
<td align="right">16.77925</td>
<td align="right">17.29031</td>
<td align="right">18.19221</td>
<td align="right">18.90315</td>
</tr>
<tr>
<th scope="row">59.5</th>
<td align="right">13.35561</td>
<td align="right">13.53336</td>
<td align="right">13.82852</td>
<td align="right">14.39194</td>
<td align="right">15.15543</td>
<td align="right">16.1334</td>
<td align="right">16.78956</td>
<td align="right">17.30732</td>
<td align="right">18.22355</td>
<td align="right">18.94832</td>
</tr>
<tr>
<th scope="row">60.5</th>
<td align="right">13.34252</td>
<td align="right">13.52091</td>
<td align="right">13.81726</td>
<td align="right">14.38345</td>
<td align="right">15.15188</td>
<td align="right">16.13843</td>
<td align="right">16.80197</td>
<td align="right">17.32657</td>
<td align="right">18.25738</td>
<td align="right">18.99615</td>
</tr>
<tr>
<th scope="row">61.5</th>
<td align="right">13.33003</td>
<td align="right">13.50915</td>
<td align="right">13.80684</td>
<td align="right">14.37609</td>
<td align="right">15.1498</td>
<td align="right">16.14531</td>
<td align="right">16.81644</td>
<td align="right">17.34803</td>
<td align="right">18.29365</td>
<td align="right">19.04659</td>
</tr>
<tr>
<th scope="row">62.5</th>
<td align="right">13.31814</td>
<td align="right">13.49808</td>
<td align="right">13.79726</td>
<td align="right">14.36984</td>
<td align="right">15.14917</td>
<td align="right">16.154</td>
<td align="right">16.83292</td>
<td align="right">17.37165</td>
<td align="right">18.3323</td>
<td align="right">19.09957</td>
</tr>
<tr>
<th scope="row">63.5</th>
<td align="right">13.30685</td>
<td align="right">13.4877</td>
<td align="right">13.78852</td>
<td align="right">14.36469</td>
<td align="right">15.14995</td>
<td align="right">16.16446</td>
<td align="right">16.85138</td>
<td align="right">17.39739</td>
<td align="right">18.37327</td>
<td align="right">19.15501</td>
</tr>
<tr>
<th scope="row">64.5</th>
<td align="right">13.29618</td>
<td align="right">13.47802</td>
<td align="right">13.78061</td>
<td align="right">14.36062</td>
<td align="right">15.15213</td>
<td align="right">16.17665</td>
<td align="right">16.87177</td>
<td align="right">17.42519</td>
<td align="right">18.41651</td>
<td align="right">19.21286</td>
</tr>
<tr>
<th scope="row">65.5</th>
<td align="right">13.28612</td>
<td align="right">13.46903</td>
<td align="right">13.77353</td>
<td align="right">14.35762</td>
<td align="right">15.15567</td>
<td align="right">16.19056</td>
<td align="right">16.89405</td>
<td align="right">17.45502</td>
<td align="right">18.46197</td>
<td align="right">19.27305</td>
</tr>
<tr>
<th scope="row">66.5</th>
<td align="right">13.27668</td>
<td align="right">13.46075</td>
<td align="right">13.76728</td>
<td align="right">14.35567</td>
<td align="right">15.16056</td>
<td align="right">16.20613</td>
<td align="right">16.91819</td>
<td align="right">17.48683</td>
<td align="right">18.50959</td>
<td align="right">19.33552</td>
</tr>
<tr>
<th scope="row">67.5</th>
<td align="right">13.26788</td>
<td align="right">13.45317</td>
<td align="right">13.76185</td>
<td align="right">14.35478</td>
<td align="right">15.16678</td>
<td align="right">16.22334</td>
<td align="right">16.94415</td>
<td align="right">17.52057</td>
<td align="right">18.55932</td>
<td align="right">19.4002</td>
</tr>
<tr>
<th scope="row">68.5</th>
<td align="right">13.2597</td>
<td align="right">13.4463</td>
<td align="right">13.75724</td>
<td align="right">14.35491</td>
<td align="right">15.17429</td>
<td align="right">16.24214</td>
<td align="right">16.97187</td>
<td align="right">17.5562</td>
<td align="right">18.61111</td>
<td align="right">19.46703</td>
</tr>
<tr>
<th scope="row">69.5</th>
<td align="right">13.25217</td>
<td align="right">13.44013</td>
<td align="right">13.75345</td>
<td align="right">14.35606</td>
<td align="right">15.18309</td>
<td align="right">16.26252</td>
<td align="right">17.00134</td>
<td align="right">17.59369</td>
<td align="right">18.6649</td>
<td align="right">19.53594</td>
</tr>
<tr>
<th scope="row">70.5</th>
<td align="right">13.24528</td>
<td align="right">13.43467</td>
<td align="right">13.75047</td>
<td align="right">14.35823</td>
<td align="right">15.19313</td>
<td align="right">16.28443</td>
<td align="right">17.03249</td>
<td align="right">17.63297</td>
<td align="right">18.72064</td>
<td align="right">19.60689</td>
</tr>
<tr>
<th scope="row">71.5</th>
<td align="right">13.23904</td>
<td align="right">13.42991</td>
<td align="right">13.7483</td>
<td align="right">14.36138</td>
<td align="right">15.20441</td>
<td align="right">16.30785</td>
<td align="right">17.06531</td>
<td align="right">17.67402</td>
<td align="right">18.77829</td>
<td align="right">19.6798</td>
</tr>
<tr>
<th scope="row">72.5</th>
<td align="right">13.23345</td>
<td align="right">13.42587</td>
<td align="right">13.74694</td>
<td align="right">14.36552</td>
<td align="right">15.2169</td>
<td align="right">16.33273</td>
<td align="right">17.09974</td>
<td align="right">17.71678</td>
<td align="right">18.83778</td>
<td align="right">19.75462</td>
</tr>
<tr>
<th scope="row">73.5</th>
<td align="right">13.22851</td>
<td align="right">13.42254</td>
<td align="right">13.74637</td>
<td align="right">14.37063</td>
<td align="right">15.23058</td>
<td align="right">16.35906</td>
<td align="right">17.13575</td>
<td align="right">17.76122</td>
<td align="right">18.89907</td>
<td align="right">19.83129</td>
</tr>
<tr>
<th scope="row">74.5</th>
<td align="right">13.22423</td>
<td align="right">13.41992</td>
<td align="right">13.74661</td>
<td align="right">14.3767</td>
<td align="right">15.24543</td>
<td align="right">16.38679</td>
<td align="right">17.17331</td>
<td align="right">17.8073</td>
<td align="right">18.96211</td>
<td align="right">19.90976</td>
</tr>
<tr>
<th scope="row">75.5</th>
<td align="right">13.22062</td>
<td align="right">13.41801</td>
<td align="right">13.74764</td>
<td align="right">14.38372</td>
<td align="right">15.26142</td>
<td align="right">16.41589</td>
<td align="right">17.21237</td>
<td align="right">17.85496</td>
<td align="right">19.02685</td>
<td align="right">19.98995</td>
</tr>
<tr>
<th scope="row">76.5</th>
<td align="right">13.21766</td>
<td align="right">13.41681</td>
<td align="right">13.74946</td>
<td align="right">14.39168</td>
<td align="right">15.27854</td>
<td align="right">16.44633</td>
<td align="right">17.2529</td>
<td align="right">17.90417</td>
<td align="right">19.09324</td>
<td align="right">20.07183</td>
</tr>
<tr>
<th scope="row">77.5</th>
<td align="right">13.21538</td>
<td align="right">13.41632</td>
<td align="right">13.75206</td>
<td align="right">14.40056</td>
<td align="right">15.29676</td>
<td align="right">16.47809</td>
<td align="right">17.29485</td>
<td align="right">17.95489</td>
<td align="right">19.16123</td>
<td align="right">20.15533</td>
</tr>
<tr>
<th scope="row">78.5</th>
<td align="right">13.21376</td>
<td align="right">13.41654</td>
<td align="right">13.75544</td>
<td align="right">14.41035</td>
<td align="right">15.31607</td>
<td align="right">16.51113</td>
<td align="right">17.3382</td>
<td align="right">18.00708</td>
<td align="right">19.23077</td>
<td align="right">20.2404</td>
</tr>
<tr>
<th scope="row">79.5</th>
<td align="right">13.21281</td>
<td align="right">13.41748</td>
<td align="right">13.75961</td>
<td align="right">14.42104</td>
<td align="right">15.33644</td>
<td align="right">16.54542</td>
<td align="right">17.38291</td>
<td align="right">18.06069</td>
<td align="right">19.30182</td>
<td align="right">20.32698</td>
</tr>
<tr>
<th scope="row">80.5</th>
<td align="right">13.21253</td>
<td align="right">13.41912</td>
<td align="right">13.76454</td>
<td align="right">14.43263</td>
<td align="right">15.35785</td>
<td align="right">16.58094</td>
<td align="right">17.42894</td>
<td align="right">18.11569</td>
<td align="right">19.37432</td>
<td align="right">20.41502</td>
</tr>
<tr>
<th scope="row">81.5</th>
<td align="right">13.21293</td>
<td align="right">13.42147</td>
<td align="right">13.77024</td>
<td align="right">14.44509</td>
<td align="right">15.38029</td>
<td align="right">16.61764</td>
<td align="right">17.47626</td>
<td align="right">18.17203</td>
<td align="right">19.44822</td>
<td align="right">20.50447</td>
</tr>
<tr>
<th scope="row">82.5</th>
<td align="right">13.214</td>
<td align="right">13.42453</td>
<td align="right">13.7767</td>
<td align="right">14.45842</td>
<td align="right">15.40374</td>
<td align="right">16.65551</td>
<td align="right">17.52482</td>
<td align="right">18.22968</td>
<td align="right">19.52349</td>
<td align="right">20.59528</td>
</tr>
<tr>
<th scope="row">83.5</th>
<td align="right">13.21574</td>
<td align="right">13.42829</td>
<td align="right">13.78393</td>
<td align="right">14.47261</td>
<td align="right">15.42817</td>
<td align="right">16.69451</td>
<td align="right">17.5746</td>
<td align="right">18.28859</td>
<td align="right">19.60008</td>
<td align="right">20.68739</td>
</tr>
<tr>
<th scope="row">84.5</th>
<td align="right">13.21816</td>
<td align="right">13.43276</td>
<td align="right">13.7919</td>
<td align="right">14.48765</td>
<td align="right">15.45357</td>
<td align="right">16.73462</td>
<td align="right">17.62557</td>
<td align="right">18.34873</td>
<td align="right">19.67794</td>
<td align="right">20.78075</td>
</tr>
<tr>
<th scope="row">85.5</th>
<td align="right">13.22125</td>
<td align="right">13.43793</td>
<td align="right">13.80063</td>
<td align="right">14.50352</td>
<td align="right">15.47991</td>
<td align="right">16.7758</td>
<td align="right">17.67768</td>
<td align="right">18.41007</td>
<td align="right">19.75702</td>
<td align="right">20.87531</td>
</tr>
<tr>
<th scope="row">86.5</th>
<td align="right">13.22502</td>
<td align="right">13.4438</td>
<td align="right">13.8101</td>
<td align="right">14.52021</td>
<td align="right">15.50718</td>
<td align="right">16.81803</td>
<td align="right">17.7309</td>
<td align="right">18.47255</td>
<td align="right">19.83728</td>
<td align="right">20.97103</td>
</tr>
<tr>
<th scope="row">87.5</th>
<td align="right">13.22946</td>
<td align="right">13.45037</td>
<td align="right">13.8203</td>
<td align="right">14.53772</td>
<td align="right">15.53537</td>
<td align="right">16.86129</td>
<td align="right">17.7852</td>
<td align="right">18.53615</td>
<td align="right">19.91867</td>
<td align="right">21.06786</td>
</tr>
<tr>
<th scope="row">88.5</th>
<td align="right">13.23458</td>
<td align="right">13.45764</td>
<td align="right">13.83124</td>
<td align="right">14.55603</td>
<td align="right">15.56444</td>
<td align="right">16.90553</td>
<td align="right">17.84055</td>
<td align="right">18.60082</td>
<td align="right">20.00116</td>
<td align="right">21.16573</td>
</tr>
<tr>
<th scope="row">89.5</th>
<td align="right">13.24037</td>
<td align="right">13.4656</td>
<td align="right">13.8429</td>
<td align="right">14.57513</td>
<td align="right">15.59439</td>
<td align="right">16.95075</td>
<td align="right">17.89692</td>
<td align="right">18.66653</td>
<td align="right">20.08469</td>
<td align="right">21.26462</td>
</tr>
<tr>
<th scope="row">90.5</th>
<td align="right">13.24683</td>
<td align="right">13.47425</td>
<td align="right">13.85529</td>
<td align="right">14.59501</td>
<td align="right">15.6252</td>
<td align="right">16.9969</td>
<td align="right">17.95426</td>
<td align="right">18.73325</td>
<td align="right">20.16923</td>
<td align="right">21.36447</td>
</tr>
<tr>
<th scope="row">91.5</th>
<td align="right">13.25397</td>
<td align="right">13.48359</td>
<td align="right">13.86839</td>
<td align="right">14.61566</td>
<td align="right">15.65684</td>
<td align="right">17.04396</td>
<td align="right">18.01256</td>
<td align="right">18.80093</td>
<td align="right">20.25473</td>
<td align="right">21.46524</td>
</tr>
<tr>
<th scope="row">92.5</th>
<td align="right">13.26177</td>
<td align="right">13.49362</td>
<td align="right">13.88221</td>
<td align="right">14.63706</td>
<td align="right">15.6893</td>
<td align="right">17.09191</td>
<td align="right">18.07177</td>
<td align="right">18.86955</td>
<td align="right">20.34116</td>
<td align="right">21.56688</td>
</tr>
<tr>
<th scope="row">93.5</th>
<td align="right">13.27025</td>
<td align="right">13.50432</td>
<td align="right">13.89673</td>
<td align="right">14.65922</td>
<td align="right">15.72257</td>
<td align="right">17.14072</td>
<td align="right">18.13187</td>
<td align="right">18.93906</td>
<td align="right">20.42846</td>
<td align="right">21.66935</td>
</tr>
<tr>
<th scope="row">94.5</th>
<td align="right">13.27939</td>
<td align="right">13.51571</td>
<td align="right">13.91194</td>
<td align="right">14.68211</td>
<td align="right">15.75662</td>
<td align="right">17.19037</td>
<td align="right">18.19283</td>
<td align="right">19.00943</td>
<td align="right">20.51661</td>
<td align="right">21.77259</td>
</tr>
<tr>
<th scope="row">95.5</th>
<td align="right">13.28919</td>
<td align="right">13.52777</td>
<td align="right">13.92785</td>
<td align="right">14.70572</td>
<td align="right">15.79143</td>
<td align="right">17.24082</td>
<td align="right">18.2546</td>
<td align="right">19.08063</td>
<td align="right">20.60555</td>
<td align="right">21.87658</td>
</tr>
<tr>
<th scope="row">96.5</th>
<td align="right">13.29966</td>
<td align="right">13.5405</td>
<td align="right">13.94445</td>
<td align="right">14.73005</td>
<td align="right">15.827</td>
<td align="right">17.29206</td>
<td align="right">18.31718</td>
<td align="right">19.15262</td>
<td align="right">20.69525</td>
<td align="right">21.98126</td>
</tr>
<tr>
<th scope="row">97.5</th>
<td align="right">13.31079</td>
<td align="right">13.5539</td>
<td align="right">13.96173</td>
<td align="right">14.75508</td>
<td align="right">15.86329</td>
<td align="right">17.34405</td>
<td align="right">18.38051</td>
<td align="right">19.22537</td>
<td align="right">20.78568</td>
<td align="right">22.0866</td>
</tr>
<tr>
<th scope="row">98.5</th>
<td align="right">13.32257</td>
<td align="right">13.56797</td>
<td align="right">13.97968</td>
<td align="right">14.78081</td>
<td align="right">15.9003</td>
<td align="right">17.39678</td>
<td align="right">18.44458</td>
<td align="right">19.29884</td>
<td align="right">20.87678</td>
<td align="right">22.19255</td>
</tr>
<tr>
<th scope="row">99.5</th>
<td align="right">13.33502</td>
<td align="right">13.58269</td>
<td align="right">13.99829</td>
<td align="right">14.80722</td>
<td align="right">15.93802</td>
<td align="right">17.45022</td>
<td align="right">18.50936</td>
<td align="right">19.37301</td>
<td align="right">20.96853</td>
<td align="right">22.29907</td>
</tr>
<tr>
<th scope="row">100.5</th>
<td align="right">13.34811</td>
<td align="right">13.59807</td>
<td align="right">14.01757</td>
<td align="right">14.8343</td>
<td align="right">15.97641</td>
<td align="right">17.50434</td>
<td align="right">18.57481</td>
<td align="right">19.44784</td>
<td align="right">21.06089</td>
<td align="right">22.40613</td>
</tr>
<tr>
<th scope="row">101.5</th>
<td align="right">13.36185</td>
<td align="right">13.6141</td>
<td align="right">14.03751</td>
<td align="right">14.86204</td>
<td align="right">16.01546</td>
<td align="right">17.55912</td>
<td align="right">18.64091</td>
<td align="right">19.52329</td>
<td align="right">21.15381</td>
<td align="right">22.51367</td>
</tr>
<tr>
<th scope="row">102.5</th>
<td align="right">13.37624</td>
<td align="right">13.63077</td>
<td align="right">14.05809</td>
<td align="right">14.89043</td>
<td align="right">16.05517</td>
<td align="right">17.61454</td>
<td align="right">18.70762</td>
<td align="right">19.59935</td>
<td align="right">21.24727</td>
<td align="right">22.62168</td>
</tr>
<tr>
<th scope="row">103.5</th>
<td align="right">13.39126</td>
<td align="right">13.64809</td>
<td align="right">14.07931</td>
<td align="right">14.91946</td>
<td align="right">16.09551</td>
<td align="right">17.67057</td>
<td align="right">18.77493</td>
<td align="right">19.67596</td>
<td align="right">21.34123</td>
<td align="right">22.73009</td>
</tr>
<tr>
<th scope="row">104.5</th>
<td align="right">13.40693</td>
<td align="right">13.66605</td>
<td align="right">14.10116</td>
<td align="right">14.94911</td>
<td align="right">16.13646</td>
<td align="right">17.7272</td>
<td align="right">18.8428</td>
<td align="right">19.75312</td>
<td align="right">21.43565</td>
<td align="right">22.83889</td>
</tr>
<tr>
<th scope="row">105.5</th>
<td align="right">13.42323</td>
<td align="right">13.68463</td>
<td align="right">14.12364</td>
<td align="right">14.97938</td>
<td align="right">16.17801</td>
<td align="right">17.78438</td>
<td align="right">18.91121</td>
<td align="right">19.83077</td>
<td align="right">21.53049</td>
<td align="right">22.94803</td>
</tr>
<tr>
<th scope="row">106.5</th>
<td align="right">13.44016</td>
<td align="right">13.70384</td>
<td align="right">14.14675</td>
<td align="right">15.01026</td>
<td align="right">16.22014</td>
<td align="right">17.84212</td>
<td align="right">18.98012</td>
<td align="right">19.9089</td>
<td align="right">21.62573</td>
<td align="right">23.05747</td>
</tr>
<tr>
<th scope="row">107.5</th>
<td align="right">13.45772</td>
<td align="right">13.72368</td>
<td align="right">14.17046</td>
<td align="right">15.04173</td>
<td align="right">16.26284</td>
<td align="right">17.90037</td>
<td align="right">19.04952</td>
<td align="right">19.98748</td>
<td align="right">21.72133</td>
<td align="right">23.16719</td>
</tr>
<tr>
<th scope="row">108.5</th>
<td align="right">13.4759</td>
<td align="right">13.74413</td>
<td align="right">14.19478</td>
<td align="right">15.07378</td>
<td align="right">16.30609</td>
<td align="right">17.95912</td>
<td align="right">19.11937</td>
<td align="right">20.06647</td>
<td align="right">21.81725</td>
<td align="right">23.27714</td>
</tr>
<tr>
<th scope="row">109.5</th>
<td align="right">13.4947</td>
<td align="right">13.76519</td>
<td align="right">14.2197</td>
<td align="right">15.10641</td>
<td align="right">16.34988</td>
<td align="right">18.01835</td>
<td align="right">19.18965</td>
<td align="right">20.14584</td>
<td align="right">21.91347</td>
<td align="right">23.3873</td>
</tr>
<tr>
<th scope="row">110.5</th>
<td align="right">13.51411</td>
<td align="right">13.78685</td>
<td align="right">14.2452</td>
<td align="right">15.1396</td>
<td align="right">16.39418</td>
<td align="right">18.07803</td>
<td align="right">19.26034</td>
<td align="right">20.22558</td>
<td align="right">22.00996</td>
<td align="right">23.49762</td>
</tr>
<tr>
<th scope="row">111.5</th>
<td align="right">13.53412</td>
<td align="right">13.80911</td>
<td align="right">14.27129</td>
<td align="right">15.17334</td>
<td align="right">16.43899</td>
<td align="right">18.13815</td>
<td align="right">19.3314</td>
<td align="right">20.30564</td>
<td align="right">22.10667</td>
<td align="right">23.60808</td>
</tr>
<tr>
<th scope="row">112.5</th>
<td align="right">13.55474</td>
<td align="right">13.83197</td>
<td align="right">14.29796</td>
<td align="right">15.20762</td>
<td align="right">16.48428</td>
<td align="right">18.19867</td>
<td align="right">19.40282</td>
<td align="right">20.38601</td>
<td align="right">22.20358</td>
<td align="right">23.71865</td>
</tr>
<tr>
<th scope="row">113.5</th>
<td align="right">13.57596</td>
<td align="right">13.85541</td>
<td align="right">14.32519</td>
<td align="right">15.24242</td>
<td align="right">16.53005</td>
<td align="right">18.25959</td>
<td align="right">19.47457</td>
<td align="right">20.46665</td>
<td align="right">22.30066</td>
<td align="right">23.82929</td>
</tr>
<tr>
<th scope="row">114.5</th>
<td align="right">13.59777</td>
<td align="right">13.87943</td>
<td align="right">14.35298</td>
<td align="right">15.27775</td>
<td align="right">16.57627</td>
<td align="right">18.32088</td>
<td align="right">19.54662</td>
<td align="right">20.54754</td>
<td align="right">22.39789</td>
<td align="right">23.93997</td>
</tr>
<tr>
<th scope="row">115.5</th>
<td align="right">13.62017</td>
<td align="right">13.90402</td>
<td align="right">14.38132</td>
<td align="right">15.31358</td>
<td align="right">16.62293</td>
<td align="right">18.38251</td>
<td align="right">19.61895</td>
<td align="right">20.62866</td>
<td align="right">22.49522</td>
<td align="right">24.05066</td>
</tr>
<tr>
<th scope="row">116.5</th>
<td align="right">13.64315</td>
<td align="right">13.92918</td>
<td align="right">14.4102</td>
<td align="right">15.3499</td>
<td align="right">16.67002</td>
<td align="right">18.44447</td>
<td align="right">19.69154</td>
<td align="right">20.70997</td>
<td align="right">22.59264</td>
<td align="right">24.16134</td>
</tr>
<tr>
<th scope="row">117.5</th>
<td align="right">13.6667</td>
<td align="right">13.9549</td>
<td align="right">14.43962</td>
<td align="right">15.38671</td>
<td align="right">16.71751</td>
<td align="right">18.50675</td>
<td align="right">19.76436</td>
<td align="right">20.79145</td>
<td align="right">22.69011</td>
<td align="right">24.27198</td>
</tr>
<tr>
<th scope="row">118.5</th>
<td align="right">13.69082</td>
<td align="right">13.98118</td>
<td align="right">14.46957</td>
<td align="right">15.42399</td>
<td align="right">16.7654</td>
<td align="right">18.5693</td>
<td align="right">19.83739</td>
<td align="right">20.87308</td>
<td align="right">22.78761</td>
<td align="right">24.38254</td>
</tr>
<tr>
<th scope="row">119.5</th>
<td align="right">13.7155</td>
<td align="right">14.008</td>
<td align="right">14.50003</td>
<td align="right">15.46173</td>
<td align="right">16.81368</td>
<td align="right">18.63213</td>
<td align="right">19.91061</td>
<td align="right">20.95484</td>
<td align="right">22.88511</td>
<td align="right">24.49299</td>
</tr>
<tr>
<th scope="row">120.5</th>
<td align="right">13.74074</td>
<td align="right">14.03535</td>
<td align="right">14.531</td>
<td align="right">15.49992</td>
<td align="right">16.86231</td>
<td align="right">18.6952</td>
<td align="right">19.984</td>
<td align="right">21.03669</td>
<td align="right">22.98258</td>
<td align="right">24.60333</td>
</tr>
<tr>
<th scope="row">121.5</th>
<td align="right">13.76653</td>
<td align="right">14.06324</td>
<td align="right">14.56247</td>
<td align="right">15.53855</td>
<td align="right">16.9113</td>
<td align="right">18.7585</td>
<td align="right">20.05753</td>
<td align="right">21.11861</td>
<td align="right">23.08</td>
<td align="right">24.71351</td>
</tr>
<tr>
<th scope="row">122.5</th>
<td align="right">13.79287</td>
<td align="right">14.09166</td>
<td align="right">14.59444</td>
<td align="right">15.57761</td>
<td align="right">16.96062</td>
<td align="right">18.82202</td>
<td align="right">20.13118</td>
<td align="right">21.20059</td>
<td align="right">23.17734</td>
<td align="right">24.82351</td>
</tr>
<tr>
<th scope="row">123.5</th>
<td align="right">13.81974</td>
<td align="right">14.12059</td>
<td align="right">14.62688</td>
<td align="right">15.61709</td>
<td align="right">17.01026</td>
<td align="right">18.88572</td>
<td align="right">20.20493</td>
<td align="right">21.28259</td>
<td align="right">23.27458</td>
<td align="right">24.93331</td>
</tr>
<tr>
<th scope="row">124.5</th>
<td align="right">13.84714</td>
<td align="right">14.15003</td>
<td align="right">14.6598</td>
<td align="right">15.65696</td>
<td align="right">17.06021</td>
<td align="right">18.94959</td>
<td align="right">20.27876</td>
<td align="right">21.3646</td>
<td align="right">23.3717</td>
<td align="right">25.04288</td>
</tr>
<tr>
<th scope="row">125.5</th>
<td align="right">13.87506</td>
<td align="right">14.17997</td>
<td align="right">14.69319</td>
<td align="right">15.69724</td>
<td align="right">17.11045</td>
<td align="right">19.01362</td>
<td align="right">20.35264</td>
<td align="right">21.44659</td>
<td align="right">23.46867</td>
<td align="right">25.15221</td>
</tr>
<tr>
<th scope="row">126.5</th>
<td align="right">13.9035</td>
<td align="right">14.21041</td>
<td align="right">14.72703</td>
<td align="right">15.73789</td>
<td align="right">17.16097</td>
<td align="right">19.07779</td>
<td align="right">20.42657</td>
<td align="right">21.52854</td>
<td align="right">23.56546</td>
<td align="right">25.26126</td>
</tr>
<tr>
<th scope="row">127.5</th>
<td align="right">13.93244</td>
<td align="right">14.24133</td>
<td align="right">14.76132</td>
<td align="right">15.77891</td>
<td align="right">17.21174</td>
<td align="right">19.14207</td>
<td align="right">20.50052</td>
<td align="right">21.61043</td>
<td align="right">23.66206</td>
<td align="right">25.37002</td>
</tr>
<tr>
<th scope="row">128.5</th>
<td align="right">13.96188</td>
<td align="right">14.27272</td>
<td align="right">14.79605</td>
<td align="right">15.8203</td>
<td align="right">17.26277</td>
<td align="right">19.20645</td>
<td align="right">20.57446</td>
<td align="right">21.69224</td>
<td align="right">23.75845</td>
<td align="right">25.47846</td>
</tr>
<tr>
<th scope="row">129.5</th>
<td align="right">13.99182</td>
<td align="right">14.30459</td>
<td align="right">14.8312</td>
<td align="right">15.86203</td>
<td align="right">17.31403</td>
<td align="right">19.27091</td>
<td align="right">20.64838</td>
<td align="right">21.77396</td>
<td align="right">23.8546</td>
<td align="right">25.58657</td>
</tr>
<tr>
<th scope="row">130.5</th>
<td align="right">14.02224</td>
<td align="right">14.33691</td>
<td align="right">14.86677</td>
<td align="right">15.9041</td>
<td align="right">17.36551</td>
<td align="right">19.33544</td>
<td align="right">20.72227</td>
<td align="right">21.85555</td>
<td align="right">23.95049</td>
<td align="right">25.69432</td>
</tr>
<tr>
<th scope="row">131.5</th>
<td align="right">14.05314</td>
<td align="right">14.36969</td>
<td align="right">14.90275</td>
<td align="right">15.94649</td>
<td align="right">17.41719</td>
<td align="right">19.40001</td>
<td align="right">20.79609</td>
<td align="right">21.937</td>
<td align="right">24.0461</td>
<td align="right">25.80169</td>
</tr>
<tr>
<th scope="row">132.5</th>
<td align="right">14.0845</td>
<td align="right">14.4029</td>
<td align="right">14.93913</td>
<td align="right">15.98919</td>
<td align="right">17.46907</td>
<td align="right">19.46462</td>
<td align="right">20.86984</td>
<td align="right">22.01829</td>
<td align="right">24.14141</td>
<td align="right">25.90868</td>
</tr>
<tr>
<th scope="row">133.5</th>
<td align="right">14.11633</td>
<td align="right">14.43656</td>
<td align="right">14.9759</td>
<td align="right">16.0322</td>
<td align="right">17.52112</td>
<td align="right">19.52924</td>
<td align="right">20.94349</td>
<td align="right">22.0994</td>
<td align="right">24.23641</td>
<td align="right">26.01525</td>
</tr>
<tr>
<th scope="row">134.5</th>
<td align="right">14.1486</td>
<td align="right">14.47063</td>
<td align="right">15.01305</td>
<td align="right">16.07549</td>
<td align="right">17.57333</td>
<td align="right">19.59386</td>
<td align="right">21.01703</td>
<td align="right">22.18031</td>
<td align="right">24.33108</td>
<td align="right">26.12139</td>
</tr>
<tr>
<th scope="row">135.5</th>
<td align="right">14.18132</td>
<td align="right">14.50512</td>
<td align="right">15.05056</td>
<td align="right">16.11907</td>
<td align="right">17.6257</td>
<td align="right">19.65846</td>
<td align="right">21.09045</td>
<td align="right">22.26101</td>
<td align="right">24.42539</td>
<td align="right">26.22709</td>
</tr>
<tr>
<th scope="row">136.5</th>
<td align="right">14.21447</td>
<td align="right">14.54002</td>
<td align="right">15.08844</td>
<td align="right">16.1629</td>
<td align="right">17.6782</td>
<td align="right">19.72302</td>
<td align="right">21.16371</td>
<td align="right">22.34148</td>
<td align="right">24.51933</td>
<td align="right">26.33233</td>
</tr>
<tr>
<th scope="row">137.5</th>
<td align="right">14.24805</td>
<td align="right">14.57531</td>
<td align="right">15.12666</td>
<td align="right">16.207</td>
<td align="right">17.73082</td>
<td align="right">19.78754</td>
<td align="right">21.23681</td>
<td align="right">22.4217</td>
<td align="right">24.61288</td>
<td align="right">26.43709</td>
</tr>
<tr>
<th scope="row">138.5</th>
<td align="right">14.28204</td>
<td align="right">14.61099</td>
<td align="right">15.16522</td>
<td align="right">16.25134</td>
<td align="right">17.78356</td>
<td align="right">19.85199</td>
<td align="right">21.30974</td>
<td align="right">22.50166</td>
<td align="right">24.70603</td>
<td align="right">26.54136</td>
</tr>
<tr>
<th scope="row">139.5</th>
<td align="right">14.31643</td>
<td align="right">14.64705</td>
<td align="right">15.20411</td>
<td align="right">16.2959</td>
<td align="right">17.83638</td>
<td align="right">19.91636</td>
<td align="right">21.38246</td>
<td align="right">22.58133</td>
<td align="right">24.79876</td>
<td align="right">26.64513</td>
</tr>
<tr>
<th scope="row">140.5</th>
<td align="right">14.35122</td>
<td align="right">14.68347</td>
<td align="right">15.24332</td>
<td align="right">16.34069</td>
<td align="right">17.88929</td>
<td align="right">19.98063</td>
<td align="right">21.45498</td>
<td align="right">22.66071</td>
<td align="right">24.89106</td>
<td align="right">26.74838</td>
</tr>
<tr>
<th scope="row">141.5</th>
<td align="right">14.3864</td>
<td align="right">14.72025</td>
<td align="right">15.28283</td>
<td align="right">16.38568</td>
<td align="right">17.94227</td>
<td align="right">20.0448</td>
<td align="right">21.52727</td>
<td align="right">22.73977</td>
<td align="right">24.98291</td>
<td align="right">26.8511</td>
</tr>
<tr>
<th scope="row">142.5</th>
<td align="right">14.42195</td>
<td align="right">14.75737</td>
<td align="right">15.32264</td>
<td align="right">16.43087</td>
<td align="right">17.99531</td>
<td align="right">20.10884</td>
<td align="right">21.59931</td>
<td align="right">22.8185</td>
<td align="right">25.0743</td>
<td align="right">26.95328</td>
</tr>
<tr>
<th scope="row">143.5</th>
<td align="right">14.45788</td>
<td align="right">14.79484</td>
<td align="right">15.36274</td>
<td align="right">16.47625</td>
<td align="right">18.04838</td>
<td align="right">20.17274</td>
<td align="right">21.67111</td>
<td align="right">22.89689</td>
<td align="right">25.16522</td>
<td align="right">27.0549</td>
</tr>
<tr>
<th scope="row">144.5</th>
<td align="right">14.49415</td>
<td align="right">14.83262</td>
<td align="right">15.40311</td>
<td align="right">16.52179</td>
<td align="right">18.10149</td>
<td align="right">20.23648</td>
<td align="right">21.74263</td>
<td align="right">22.97493</td>
<td align="right">25.25564</td>
<td align="right">27.15596</td>
</tr>
<tr>
<th scope="row">145.5</th>
<td align="right">14.53078</td>
<td align="right">14.87073</td>
<td align="right">15.44374</td>
<td align="right">16.5675</td>
<td align="right">18.15461</td>
<td align="right">20.30006</td>
<td align="right">21.81386</td>
<td align="right">23.05259</td>
<td align="right">25.34557</td>
<td align="right">27.25645</td>
</tr>
<tr>
<th scope="row">146.5</th>
<td align="right">14.56773</td>
<td align="right">14.90914</td>
<td align="right">15.48462</td>
<td align="right">16.61335</td>
<td align="right">18.20774</td>
<td align="right">20.36346</td>
<td align="right">21.8848</td>
<td align="right">23.12987</td>
<td align="right">25.43498</td>
<td align="right">27.35636</td>
</tr>
<tr>
<th scope="row">147.5</th>
<td align="right">14.60502</td>
<td align="right">14.94784</td>
<td align="right">15.52574</td>
<td align="right">16.65934</td>
<td align="right">18.26085</td>
<td align="right">20.42667</td>
<td align="right">21.95543</td>
<td align="right">23.20675</td>
<td align="right">25.52387</td>
<td align="right">27.45567</td>
</tr>
<tr>
<th scope="row">148.5</th>
<td align="right">14.64262</td>
<td align="right">14.98682</td>
<td align="right">15.5671</td>
<td align="right">16.70546</td>
<td align="right">18.31395</td>
<td align="right">20.48967</td>
<td align="right">22.02573</td>
<td align="right">23.28323</td>
<td align="right">25.61223</td>
<td align="right">27.55439</td>
</tr>
<tr>
<th scope="row">149.5</th>
<td align="right">14.68052</td>
<td align="right">15.02607</td>
<td align="right">15.60867</td>
<td align="right">16.75168</td>
<td align="right">18.36701</td>
<td align="right">20.55245</td>
<td align="right">22.0957</td>
<td align="right">23.35928</td>
<td align="right">25.70005</td>
<td align="right">27.6525</td>
</tr>
<tr>
<th scope="row">150.5</th>
<td align="right">14.71871</td>
<td align="right">15.06559</td>
<td align="right">15.65044</td>
<td align="right">16.79801</td>
<td align="right">18.42002</td>
<td align="right">20.61499</td>
<td align="right">22.16532</td>
<td align="right">23.43491</td>
<td align="right">25.78731</td>
<td align="right">27.75</td>
</tr>
<tr>
<th scope="row">151.5</th>
<td align="right">14.75718</td>
<td align="right">15.10535</td>
<td align="right">15.69241</td>
<td align="right">16.84442</td>
<td align="right">18.47298</td>
<td align="right">20.67729</td>
<td align="right">22.23458</td>
<td align="right">23.51008</td>
<td align="right">25.87401</td>
<td align="right">27.84688</td>
</tr>
<tr>
<th scope="row">152.5</th>
<td align="right">14.79592</td>
<td align="right">15.14535</td>
<td align="right">15.73456</td>
<td align="right">16.89091</td>
<td align="right">18.52586</td>
<td align="right">20.73934</td>
<td align="right">22.30346</td>
<td align="right">23.58481</td>
<td align="right">25.96013</td>
<td align="right">27.94314</td>
</tr>
<tr>
<th scope="row">153.5</th>
<td align="right">14.83492</td>
<td align="right">15.18558</td>
<td align="right">15.77689</td>
<td align="right">16.93746</td>
<td align="right">18.57866</td>
<td align="right">20.80112</td>
<td align="right">22.37196</td>
<td align="right">23.65907</td>
<td align="right">26.04568</td>
<td align="right">28.03877</td>
</tr>
<tr>
<th scope="row">154.5</th>
<td align="right">14.87417</td>
<td align="right">15.22602</td>
<td align="right">15.81937</td>
<td align="right">16.98407</td>
<td align="right">18.63136</td>
<td align="right">20.86261</td>
<td align="right">22.44007</td>
<td align="right">23.73285</td>
<td align="right">26.13065</td>
<td align="right">28.13377</td>
</tr>
<tr>
<th scope="row">155.5</th>
<td align="right">14.91365</td>
<td align="right">15.26666</td>
<td align="right">15.86199</td>
<td align="right">17.03071</td>
<td align="right">18.68396</td>
<td align="right">20.92382</td>
<td align="right">22.50777</td>
<td align="right">23.80615</td>
<td align="right">26.21502</td>
<td align="right">28.22813</td>
</tr>
<tr>
<th scope="row">156.5</th>
<td align="right">14.95335</td>
<td align="right">15.30749</td>
<td align="right">15.90476</td>
<td align="right">17.07738</td>
<td align="right">18.73643</td>
<td align="right">20.98472</td>
<td align="right">22.57506</td>
<td align="right">23.87895</td>
<td align="right">26.2988</td>
<td align="right">28.32185</td>
</tr>
<tr>
<th scope="row">157.5</th>
<td align="right">14.99326</td>
<td align="right">15.34849</td>
<td align="right">15.94764</td>
<td align="right">17.12407</td>
<td align="right">18.78878</td>
<td align="right">21.04531</td>
<td align="right">22.64192</td>
<td align="right">23.95126</td>
<td align="right">26.38197</td>
<td align="right">28.41494</td>
</tr>
<tr>
<th scope="row">158.5</th>
<td align="right">15.03336</td>
<td align="right">15.38966</td>
<td align="right">15.99063</td>
<td align="right">17.17076</td>
<td align="right">18.84098</td>
<td align="right">21.10557</td>
<td align="right">22.70835</td>
<td align="right">24.02305</td>
<td align="right">26.46453</td>
<td align="right">28.50739</td>
</tr>
<tr>
<th scope="row">159.5</th>
<td align="right">15.07365</td>
<td align="right">15.43098</td>
<td align="right">16.03372</td>
<td align="right">17.21744</td>
<td align="right">18.89302</td>
<td align="right">21.1655</td>
<td align="right">22.77434</td>
<td align="right">24.09433</td>
<td align="right">26.54648</td>
<td align="right">28.59919</td>
</tr>
<tr>
<th scope="row">160.5</th>
<td align="right">15.11411</td>
<td align="right">15.47244</td>
<td align="right">16.0769</td>
<td align="right">17.26409</td>
<td align="right">18.9449</td>
<td align="right">21.22508</td>
<td align="right">22.83987</td>
<td align="right">24.16508</td>
<td align="right">26.62782</td>
<td align="right">28.69036</td>
</tr>
<tr>
<th scope="row">161.5</th>
<td align="right">15.15473</td>
<td align="right">15.51403</td>
<td align="right">16.12014</td>
<td align="right">17.31072</td>
<td align="right">18.9966</td>
<td align="right">21.28431</td>
<td align="right">22.90494</td>
<td align="right">24.23529</td>
<td align="right">26.70853</td>
<td align="right">28.78088</td>
</tr>
<tr>
<th scope="row">162.5</th>
<td align="right">15.19549</td>
<td align="right">15.55572</td>
<td align="right">16.16345</td>
<td align="right">17.35729</td>
<td align="right">19.04811</td>
<td align="right">21.34317</td>
<td align="right">22.96954</td>
<td align="right">24.30497</td>
<td align="right">26.78862</td>
<td align="right">28.87077</td>
</tr>
<tr>
<th scope="row">163.5</th>
<td align="right">15.23639</td>
<td align="right">15.59752</td>
<td align="right">16.2068</td>
<td align="right">17.40381</td>
<td align="right">19.09942</td>
<td align="right">21.40166</td>
<td align="right">23.03366</td>
<td align="right">24.37411</td>
<td align="right">26.86808</td>
<td align="right">28.96002</td>
</tr>
<tr>
<th scope="row">164.5</th>
<td align="right">15.2774</td>
<td align="right">15.63941</td>
<td align="right">16.25018</td>
<td align="right">17.45026</td>
<td align="right">19.15052</td>
<td align="right">21.45977</td>
<td align="right">23.09731</td>
<td align="right">24.44269</td>
<td align="right">26.94692</td>
<td align="right">29.04864</td>
</tr>
<tr>
<th scope="row">165.5</th>
<td align="right">15.31852</td>
<td align="right">15.68136</td>
<td align="right">16.29358</td>
<td align="right">17.49662</td>
<td align="right">19.20139</td>
<td align="right">21.51749</td>
<td align="right">23.16045</td>
<td align="right">24.51071</td>
<td align="right">27.02513</td>
<td align="right">29.13663</td>
</tr>
<tr>
<th scope="row">166.5</th>
<td align="right">15.35972</td>
<td align="right">15.72338</td>
<td align="right">16.33699</td>
<td align="right">17.54289</td>
<td align="right">19.25204</td>
<td align="right">21.5748</td>
<td align="right">23.22311</td>
<td align="right">24.57818</td>
<td align="right">27.1027</td>
<td align="right">29.22399</td>
</tr>
<tr>
<th scope="row">167.5</th>
<td align="right">15.40101</td>
<td align="right">15.76544</td>
<td align="right">16.38039</td>
<td align="right">17.58905</td>
<td align="right">19.30243</td>
<td align="right">21.63171</td>
<td align="right">23.28525</td>
<td align="right">24.64508</td>
<td align="right">27.17965</td>
<td align="right">29.31073</td>
</tr>
<tr>
<th scope="row">168.5</th>
<td align="right">15.44235</td>
<td align="right">15.80753</td>
<td align="right">16.42378</td>
<td align="right">17.63509</td>
<td align="right">19.35257</td>
<td align="right">21.68819</td>
<td align="right">23.34689</td>
<td align="right">24.71141</td>
<td align="right">27.25597</td>
<td align="right">29.39686</td>
</tr>
<tr>
<th scope="row">169.5</th>
<td align="right">15.48374</td>
<td align="right">15.84964</td>
<td align="right">16.46712</td>
<td align="right">17.68099</td>
<td align="right">19.40245</td>
<td align="right">21.74426</td>
<td align="right">23.40801</td>
<td align="right">24.77716</td>
<td align="right">27.33167</td>
<td align="right">29.48237</td>
</tr>
<tr>
<th scope="row">170.5</th>
<td align="right">15.52517</td>
<td align="right">15.89175</td>
<td align="right">16.51042</td>
<td align="right">17.72675</td>
<td align="right">19.45204</td>
<td align="right">21.79989</td>
<td align="right">23.46861</td>
<td align="right">24.84234</td>
<td align="right">27.40673</td>
<td align="right">29.56729</td>
</tr>
<tr>
<th scope="row">171.5</th>
<td align="right">15.56661</td>
<td align="right">15.93385</td>
<td align="right">16.55366</td>
<td align="right">17.77236</td>
<td align="right">19.50136</td>
<td align="right">21.85508</td>
<td align="right">23.52868</td>
<td align="right">24.90694</td>
<td align="right">27.48118</td>
<td align="right">29.6516</td>
</tr>
<tr>
<th scope="row">172.5</th>
<td align="right">15.60805</td>
<td align="right">15.97592</td>
<td align="right">16.59682</td>
<td align="right">17.81779</td>
<td align="right">19.55037</td>
<td align="right">21.90982</td>
<td align="right">23.58823</td>
<td align="right">24.97096</td>
<td align="right">27.555</td>
<td align="right">29.73533</td>
</tr>
<tr>
<th scope="row">173.5</th>
<td align="right">15.64949</td>
<td align="right">16.01795</td>
<td align="right">16.63989</td>
<td align="right">17.86304</td>
<td align="right">19.59907</td>
<td align="right">21.96411</td>
<td align="right">23.64723</td>
<td align="right">25.0344</td>
<td align="right">27.6282</td>
<td align="right">29.81848</td>
</tr>
<tr>
<th scope="row">174.5</th>
<td align="right">15.69089</td>
<td align="right">16.05992</td>
<td align="right">16.68286</td>
<td align="right">17.90809</td>
<td align="right">19.64746</td>
<td align="right">22.01794</td>
<td align="right">23.7057</td>
<td align="right">25.09725</td>
<td align="right">27.70079</td>
<td align="right">29.90107</td>
</tr>
<tr>
<th scope="row">175.5</th>
<td align="right">15.73225</td>
<td align="right">16.10183</td>
<td align="right">16.72571</td>
<td align="right">17.95294</td>
<td align="right">19.69552</td>
<td align="right">22.0713</td>
<td align="right">23.76363</td>
<td align="right">25.15951</td>
<td align="right">27.77277</td>
<td align="right">29.98309</td>
</tr>
<tr>
<th scope="row">176.5</th>
<td align="right">15.77356</td>
<td align="right">16.14364</td>
<td align="right">16.76842</td>
<td align="right">17.99756</td>
<td align="right">19.74325</td>
<td align="right">22.12419</td>
<td align="right">23.82101</td>
<td align="right">25.22119</td>
<td align="right">27.84414</td>
<td align="right">30.06456</td>
</tr>
<tr>
<th scope="row">177.5</th>
<td align="right">15.81478</td>
<td align="right">16.18536</td>
<td align="right">16.81099</td>
<td align="right">18.04195</td>
<td align="right">19.79062</td>
<td align="right">22.1766</td>
<td align="right">23.87784</td>
<td align="right">25.28228</td>
<td align="right">27.91491</td>
<td align="right">30.1455</td>
</tr>
<tr>
<th scope="row">178.5</th>
<td align="right">15.85592</td>
<td align="right">16.22696</td>
<td align="right">16.8534</td>
<td align="right">18.0861</td>
<td align="right">19.83764</td>
<td align="right">22.22852</td>
<td align="right">23.93412</td>
<td align="right">25.34279</td>
<td align="right">27.98509</td>
<td align="right">30.22591</td>
</tr>
<tr>
<th scope="row">179.5</th>
<td align="right">15.89695</td>
<td align="right">16.26842</td>
<td align="right">16.89563</td>
<td align="right">18.12998</td>
<td align="right">19.88429</td>
<td align="right">22.27996</td>
<td align="right">23.98985</td>
<td align="right">25.40271</td>
<td align="right">28.05468</td>
<td align="right">30.3058</td>
</tr>
<tr>
<th scope="row">180.5</th>
<td align="right">15.93785</td>
<td align="right">16.30974</td>
<td align="right">16.93767</td>
<td align="right">18.1736</td>
<td align="right">19.93057</td>
<td align="right">22.3309</td>
<td align="right">24.04503</td>
<td align="right">25.46204</td>
<td align="right">28.12369</td>
<td align="right">30.3852</td>
</tr>
<tr>
<th scope="row">181.5</th>
<td align="right">15.97862</td>
<td align="right">16.35089</td>
<td align="right">16.97951</td>
<td align="right">18.21693</td>
<td align="right">19.97646</td>
<td align="right">22.38135</td>
<td align="right">24.09964</td>
<td align="right">25.5208</td>
<td align="right">28.19213</td>
<td align="right">30.46411</td>
</tr>
<tr>
<th scope="row">182.5</th>
<td align="right">16.01923</td>
<td align="right">16.39185</td>
<td align="right">17.02112</td>
<td align="right">18.25996</td>
<td align="right">20.02195</td>
<td align="right">22.43128</td>
<td align="right">24.1537</td>
<td align="right">25.57897</td>
<td align="right">28.26</td>
<td align="right">30.54255</td>
</tr>
<tr>
<th scope="row">183.5</th>
<td align="right">16.05966</td>
<td align="right">16.43262</td>
<td align="right">17.0625</td>
<td align="right">18.30269</td>
<td align="right">20.06704</td>
<td align="right">22.48072</td>
<td align="right">24.20721</td>
<td align="right">25.63656</td>
<td align="right">28.32732</td>
<td align="right">30.62053</td>
</tr>
<tr>
<th scope="row">184.5</th>
<td align="right">16.0999</td>
<td align="right">16.47318</td>
<td align="right">17.10363</td>
<td align="right">18.3451</td>
<td align="right">20.11172</td>
<td align="right">22.52963</td>
<td align="right">24.26015</td>
<td align="right">25.69357</td>
<td align="right">28.39408</td>
<td align="right">30.69807</td>
</tr>
<tr>
<th scope="row">185.5</th>
<td align="right">16.13993</td>
<td align="right">16.51351</td>
<td align="right">17.14448</td>
<td align="right">18.38717</td>
<td align="right">20.15598</td>
<td align="right">22.57804</td>
<td align="right">24.31254</td>
<td align="right">25.75002</td>
<td align="right">28.46031</td>
<td align="right">30.77519</td>
</tr>
<tr>
<th scope="row">186.5</th>
<td align="right">16.17973</td>
<td align="right">16.55358</td>
<td align="right">17.18506</td>
<td align="right">18.42889</td>
<td align="right">20.19981</td>
<td align="right">22.62592</td>
<td align="right">24.36437</td>
<td align="right">25.80589</td>
<td align="right">28.52602</td>
<td align="right">30.8519</td>
</tr>
<tr>
<th scope="row">187.5</th>
<td align="right">16.21929</td>
<td align="right">16.5934</td>
<td align="right">17.22534</td>
<td align="right">18.47025</td>
<td align="right">20.2432</td>
<td align="right">22.67329</td>
<td align="right">24.41564</td>
<td align="right">25.8612</td>
<td align="right">28.5912</td>
<td align="right">30.92822</td>
</tr>
<tr>
<th scope="row">188.5</th>
<td align="right">16.25859</td>
<td align="right">16.63293</td>
<td align="right">17.2653</td>
<td align="right">18.51124</td>
<td align="right">20.28614</td>
<td align="right">22.72013</td>
<td align="right">24.46636</td>
<td align="right">25.91595</td>
<td align="right">28.65588</td>
<td align="right">31.00417</td>
</tr>
<tr>
<th scope="row">189.5</th>
<td align="right">16.2976</td>
<td align="right">16.67216</td>
<td align="right">17.30494</td>
<td align="right">18.55184</td>
<td align="right">20.32862</td>
<td align="right">22.76644</td>
<td align="right">24.51653</td>
<td align="right">25.97014</td>
<td align="right">28.72007</td>
<td align="right">31.07976</td>
</tr>
<tr>
<th scope="row">190.5</th>
<td align="right">16.33631</td>
<td align="right">16.71107</td>
<td align="right">17.34423</td>
<td align="right">18.59205</td>
<td align="right">20.37064</td>
<td align="right">22.81222</td>
<td align="right">24.56614</td>
<td align="right">26.02379</td>
<td align="right">28.78378</td>
<td align="right">31.15502</td>
</tr>
<tr>
<th scope="row">191.5</th>
<td align="right">16.37471</td>
<td align="right">16.74965</td>
<td align="right">17.38316</td>
<td align="right">18.63184</td>
<td align="right">20.41219</td>
<td align="right">22.85747</td>
<td align="right">24.61521</td>
<td align="right">26.07689</td>
<td align="right">28.84702</td>
<td align="right">31.22997</td>
</tr>
<tr>
<th scope="row">192.5</th>
<td align="right">16.41277</td>
<td align="right">16.78787</td>
<td align="right">17.42171</td>
<td align="right">18.67121</td>
<td align="right">20.45326</td>
<td align="right">22.90219</td>
<td align="right">24.66372</td>
<td align="right">26.12945</td>
<td align="right">28.90981</td>
<td align="right">31.30462</td>
</tr>
<tr>
<th scope="row">193.5</th>
<td align="right">16.45047</td>
<td align="right">16.82573</td>
<td align="right">17.45986</td>
<td align="right">18.71015</td>
<td align="right">20.49383</td>
<td align="right">22.94637</td>
<td align="right">24.7117</td>
<td align="right">26.18148</td>
<td align="right">28.97215</td>
<td align="right">31.379</td>
</tr>
<tr>
<th scope="row">194.5</th>
<td align="right">16.4878</td>
<td align="right">16.8632</td>
<td align="right">17.49761</td>
<td align="right">18.74863</td>
<td align="right">20.53392</td>
<td align="right">22.99002</td>
<td align="right">24.75913</td>
<td align="right">26.23299</td>
<td align="right">29.03407</td>
<td align="right">31.45314</td>
</tr>
<tr>
<th scope="row">195.5</th>
<td align="right">16.52473</td>
<td align="right">16.90025</td>
<td align="right">17.53492</td>
<td align="right">18.78665</td>
<td align="right">20.57349</td>
<td align="right">23.03313</td>
<td align="right">24.80603</td>
<td align="right">26.28399</td>
<td align="right">29.09558</td>
<td align="right">31.52704</td>
</tr>
<tr>
<th scope="row">196.5</th>
<td align="right">16.56124</td>
<td align="right">16.93689</td>
<td align="right">17.5718</td>
<td align="right">18.82419</td>
<td align="right">20.61256</td>
<td align="right">23.07571</td>
<td align="right">24.8524</td>
<td align="right">26.33448</td>
<td align="right">29.1567</td>
<td align="right">31.60075</td>
</tr>
<tr>
<th scope="row">197.5</th>
<td align="right">16.59733</td>
<td align="right">16.97308</td>
<td align="right">17.60821</td>
<td align="right">18.86125</td>
<td align="right">20.65111</td>
<td align="right">23.11774</td>
<td align="right">24.89824</td>
<td align="right">26.38446</td>
<td align="right">29.21743</td>
<td align="right">31.67427</td>
</tr>
<tr>
<th scope="row">198.5</th>
<td align="right">16.63295</td>
<td align="right">17.0088</td>
<td align="right">17.64415</td>
<td align="right">18.8978</td>
<td align="right">20.68912</td>
<td align="right">23.15924</td>
<td align="right">24.94356</td>
<td align="right">26.43396</td>
<td align="right">29.27781</td>
<td align="right">31.74764</td>
</tr>
<tr>
<th scope="row">199.5</th>
<td align="right">16.66811</td>
<td align="right">17.04404</td>
<td align="right">17.67959</td>
<td align="right">18.93384</td>
<td align="right">20.72661</td>
<td align="right">23.2002</td>
<td align="right">24.98836</td>
<td align="right">26.48298</td>
<td align="right">29.33784</td>
<td align="right">31.82088</td>
</tr>
<tr>
<th scope="row">200.5</th>
<td align="right">16.70276</td>
<td align="right">17.07879</td>
<td align="right">17.71452</td>
<td align="right">18.96935</td>
<td align="right">20.76355</td>
<td align="right">23.24062</td>
<td align="right">25.03265</td>
<td align="right">26.53153</td>
<td align="right">29.39755</td>
<td align="right">31.89401</td>
</tr>
<tr>
<th scope="row">201.5</th>
<td align="right">16.7369</td>
<td align="right">17.11301</td>
<td align="right">17.74892</td>
<td align="right">19.00432</td>
<td align="right">20.79994</td>
<td align="right">23.28051</td>
<td align="right">25.07643</td>
<td align="right">26.57962</td>
<td align="right">29.45695</td>
<td align="right">31.96706</td>
</tr>
<tr>
<th scope="row">202.5</th>
<td align="right">16.77051</td>
<td align="right">17.14669</td>
<td align="right">17.78278</td>
<td align="right">19.03874</td>
<td align="right">20.83578</td>
<td align="right">23.31986</td>
<td align="right">25.11972</td>
<td align="right">26.62726</td>
<td align="right">29.51606</td>
<td align="right">32.04007</td>
</tr>
<tr>
<th scope="row">203.5</th>
<td align="right">16.80356</td>
<td align="right">17.17981</td>
<td align="right">17.81607</td>
<td align="right">19.07258</td>
<td align="right">20.87105</td>
<td align="right">23.35867</td>
<td align="right">25.16251</td>
<td align="right">26.67447</td>
<td align="right">29.57491</td>
<td align="right">32.11305</td>
</tr>
<tr>
<th scope="row">204.5</th>
<td align="right">16.83603</td>
<td align="right">17.21234</td>
<td align="right">17.84878</td>
<td align="right">19.10585</td>
<td align="right">20.90576</td>
<td align="right">23.39696</td>
<td align="right">25.20482</td>
<td align="right">26.72125</td>
<td align="right">29.6335</td>
<td align="right">32.18603</td>
</tr>
<tr>
<th scope="row">205.5</th>
<td align="right">16.8679</td>
<td align="right">17.24429</td>
<td align="right">17.88089</td>
<td align="right">19.13852</td>
<td align="right">20.93988</td>
<td align="right">23.43471</td>
<td align="right">25.24665</td>
<td align="right">26.76761</td>
<td align="right">29.69187</td>
<td align="right">32.25905</td>
</tr>
<tr>
<th scope="row">206.5</th>
<td align="right">16.89915</td>
<td align="right">17.2756</td>
<td align="right">17.91238</td>
<td align="right">19.17059</td>
<td align="right">20.97343</td>
<td align="right">23.47193</td>
<td align="right">25.28802</td>
<td align="right">26.81358</td>
<td align="right">29.75004</td>
<td align="right">32.33212</td>
</tr>
<tr>
<th scope="row">207.5</th>
<td align="right">16.92975</td>
<td align="right">17.30628</td>
<td align="right">17.94324</td>
<td align="right">19.20204</td>
<td align="right">21.00638</td>
<td align="right">23.50863</td>
<td align="right">25.32892</td>
<td align="right">26.85915</td>
<td align="right">29.80802</td>
<td align="right">32.40529</td>
</tr>
<tr>
<th scope="row">208.5</th>
<td align="right">16.95969</td>
<td align="right">17.3363</td>
<td align="right">17.97344</td>
<td align="right">19.23285</td>
<td align="right">21.03874</td>
<td align="right">23.5448</td>
<td align="right">25.36937</td>
<td align="right">26.90436</td>
<td align="right">29.86584</td>
<td align="right">32.47859</td>
</tr>
<tr>
<th scope="row">209.5</th>
<td align="right">16.98894</td>
<td align="right">17.36564</td>
<td align="right">18.00298</td>
<td align="right">19.26301</td>
<td align="right">21.07049</td>
<td align="right">23.58045</td>
<td align="right">25.40938</td>
<td align="right">26.9492</td>
<td align="right">29.92352</td>
<td align="right">32.55204</td>
</tr>
<tr>
<th scope="row">210.5</th>
<td align="right">17.01749</td>
<td align="right">17.39427</td>
<td align="right">18.03182</td>
<td align="right">19.29252</td>
<td align="right">21.10163</td>
<td align="right">23.61558</td>
<td align="right">25.44895</td>
<td align="right">26.9937</td>
<td align="right">29.98109</td>
<td align="right">32.62567</td>
</tr>
<tr>
<th scope="row">211.5</th>
<td align="right">17.0453</td>
<td align="right">17.42218</td>
<td align="right">18.05996</td>
<td align="right">19.32135</td>
<td align="right">21.13216</td>
<td align="right">23.65019</td>
<td align="right">25.4881</td>
<td align="right">27.03787</td>
<td align="right">30.03857</td>
<td align="right">32.69952</td>
</tr>
<tr>
<th scope="row">212.5</th>
<td align="right">17.07236</td>
<td align="right">17.44935</td>
<td align="right">18.08737</td>
<td align="right">19.34949</td>
<td align="right">21.16206</td>
<td align="right">23.68429</td>
<td align="right">25.52684</td>
<td align="right">27.08173</td>
<td align="right">30.09599</td>
<td align="right">32.77362</td>
</tr>
<tr>
<th scope="row">213.5</th>
<td align="right">17.09864</td>
<td align="right">17.47576</td>
<td align="right">18.11403</td>
<td align="right">19.37693</td>
<td align="right">21.19134</td>
<td align="right">23.71788</td>
<td align="right">25.56517</td>
<td align="right">27.12528</td>
<td align="right">30.15337</td>
<td align="right">32.84802</td>
</tr>
<tr>
<th scope="row">214.5</th>
<td align="right">17.12413</td>
<td align="right">17.50137</td>
<td align="right">18.13993</td>
<td align="right">19.40366</td>
<td align="right">21.21997</td>
<td align="right">23.75097</td>
<td align="right">25.60311</td>
<td align="right">27.16856</td>
<td align="right">30.21074</td>
<td align="right">32.92272</td>
</tr>
<tr>
<th scope="row">215.5</th>
<td align="right">17.14879</td>
<td align="right">17.52618</td>
<td align="right">18.16505</td>
<td align="right">19.42965</td>
<td align="right">21.24797</td>
<td align="right">23.78356</td>
<td align="right">25.64067</td>
<td align="right">27.21157</td>
<td align="right">30.26812</td>
<td align="right">32.99779</td>
</tr>
<tr>
<th scope="row">216.5</th>
<td align="right">17.1726</td>
<td align="right">17.55015</td>
<td align="right">18.18937</td>
<td align="right">19.45491</td>
<td align="right">21.27532</td>
<td align="right">23.81564</td>
<td align="right">25.67786</td>
<td align="right">27.25433</td>
<td align="right">30.32554</td>
<td align="right">33.07324</td>
</tr>
<tr>
<th scope="row">217.5</th>
<td align="right">17.19555</td>
<td align="right">17.57328</td>
<td align="right">18.21286</td>
<td align="right">19.47941</td>
<td align="right">21.30202</td>
<td align="right">23.84724</td>
<td align="right">25.7147</td>
<td align="right">27.29686</td>
<td align="right">30.38304</td>
<td align="right">33.14912</td>
</tr>
<tr>
<th scope="row">218.5</th>
<td align="right">17.2176</td>
<td align="right">17.59553</td>
<td align="right">18.23552</td>
<td align="right">19.50314</td>
<td align="right">21.32805</td>
<td align="right">23.87835</td>
<td align="right">25.75118</td>
<td align="right">27.33918</td>
<td align="right">30.44063</td>
<td align="right">33.22546</td>
</tr>
<tr>
<th scope="row">219.5</th>
<td align="right">17.23874</td>
<td align="right">17.61689</td>
<td align="right">18.25732</td>
<td align="right">19.52608</td>
<td align="right">21.35343</td>
<td align="right">23.90898</td>
<td align="right">25.78733</td>
<td align="right">27.3813</td>
<td align="right">30.49835</td>
<td align="right">33.30231</td>
</tr>
<tr>
<th scope="row">220.5</th>
<td align="right">17.25894</td>
<td align="right">17.63733</td>
<td align="right">18.27824</td>
<td align="right">19.54823</td>
<td align="right">21.37812</td>
<td align="right">23.93912</td>
<td align="right">25.82317</td>
<td align="right">27.42325</td>
<td align="right">30.55623</td>
<td align="right">33.37969</td>
</tr>
<tr>
<th scope="row">221.5</th>
<td align="right">17.27818</td>
<td align="right">17.65683</td>
<td align="right">18.29826</td>
<td align="right">19.56957</td>
<td align="right">21.40215</td>
<td align="right">23.9688</td>
<td align="right">25.85869</td>
<td align="right">27.46505</td>
<td align="right">30.6143</td>
<td align="right">33.45766</td>
</tr>
<tr>
<th scope="row">222.5</th>
<td align="right">17.29643</td>
<td align="right">17.67537</td>
<td align="right">18.31736</td>
<td align="right">19.59008</td>
<td align="right">21.42548</td>
<td align="right">23.99801</td>
<td align="right">25.89392</td>
<td align="right">27.50671</td>
<td align="right">30.6726</td>
<td align="right">33.53624</td>
</tr>
<tr>
<th scope="row">223.5</th>
<td align="right">17.31367</td>
<td align="right">17.69293</td>
<td align="right">18.33552</td>
<td align="right">19.60975</td>
<td align="right">21.44813</td>
<td align="right">24.02676</td>
<td align="right">25.92887</td>
<td align="right">27.54826</td>
<td align="right">30.73114</td>
<td align="right">33.61548</td>
</tr>
<tr>
<th scope="row">224.5</th>
<td align="right">17.32987</td>
<td align="right">17.70948</td>
<td align="right">18.35273</td>
<td align="right">19.62857</td>
<td align="right">21.47008</td>
<td align="right">24.05505</td>
<td align="right">25.96356</td>
<td align="right">27.58971</td>
<td align="right">30.78997</td>
<td align="right">33.69542</td>
</tr>
<tr>
<th scope="row">225.5</th>
<td align="right">17.34501</td>
<td align="right">17.725</td>
<td align="right">18.36896</td>
<td align="right">19.64651</td>
<td align="right">21.49134</td>
<td align="right">24.08289</td>
<td align="right">25.99799</td>
<td align="right">27.63109</td>
<td align="right">30.84911</td>
<td align="right">33.77609</td>
</tr>
<tr>
<th scope="row">226.5</th>
<td align="right">17.35907</td>
<td align="right">17.73946</td>
<td align="right">18.38419</td>
<td align="right">19.66358</td>
<td align="right">21.51188</td>
<td align="right">24.11029</td>
<td align="right">26.03219</td>
<td align="right">27.67242</td>
<td align="right">30.90861</td>
<td align="right">33.85756</td>
</tr>
<tr>
<th scope="row">227.5</th>
<td align="right">17.37203</td>
<td align="right">17.75286</td>
<td align="right">18.39841</td>
<td align="right">19.67975</td>
<td align="right">21.53171</td>
<td align="right">24.13725</td>
<td align="right">26.06617</td>
<td align="right">27.71372</td>
<td align="right">30.96849</td>
<td align="right">33.93984</td>
</tr>
<tr>
<th scope="row">228.5</th>
<td align="right">17.38385</td>
<td align="right">17.76515</td>
<td align="right">18.41159</td>
<td align="right">19.695</td>
<td align="right">21.55082</td>
<td align="right">24.16378</td>
<td align="right">26.09993</td>
<td align="right">27.75502</td>
<td align="right">31.0288</td>
<td align="right">34.023</td>
</tr>
<tr>
<th scope="row">229.5</th>
<td align="right">17.39451</td>
<td align="right">17.77632</td>
<td align="right">18.42371</td>
<td align="right">19.70933</td>
<td align="right">21.56921</td>
<td align="right">24.18988</td>
<td align="right">26.13351</td>
<td align="right">27.79633</td>
<td align="right">31.08956</td>
<td align="right">34.10707</td>
</tr>
<tr>
<th scope="row">230.5</th>
<td align="right">17.40399</td>
<td align="right">17.78635</td>
<td align="right">18.43475</td>
<td align="right">19.72272</td>
<td align="right">21.58686</td>
<td align="right">24.21557</td>
<td align="right">26.16692</td>
<td align="right">27.83769</td>
<td align="right">31.15082</td>
<td align="right">34.1921</td>
</tr>
<tr>
<th scope="row">231.5</th>
<td align="right">17.41226</td>
<td align="right">17.79521</td>
<td align="right">18.4447</td>
<td align="right">19.73516</td>
<td align="right">21.60378</td>
<td align="right">24.24084</td>
<td align="right">26.20016</td>
<td align="right">27.8791</td>
<td align="right">31.21261</td>
<td align="right">34.27814</td>
</tr>
<tr>
<th scope="row">232.5</th>
<td align="right">17.4193</td>
<td align="right">17.80288</td>
<td align="right">18.45352</td>
<td align="right">19.74662</td>
<td align="right">21.61996</td>
<td align="right">24.26571</td>
<td align="right">26.23326</td>
<td align="right">27.92061</td>
<td align="right">31.27496</td>
<td align="right">34.36522</td>
</tr>
<tr>
<th scope="row">233.5</th>
<td align="right">17.42508</td>
<td align="right">17.80934</td>
<td align="right">18.46121</td>
<td align="right">19.7571</td>
<td align="right">21.63539</td>
<td align="right">24.29019</td>
<td align="right">26.26624</td>
<td align="right">27.96223</td>
<td align="right">31.33793</td>
<td align="right">34.45341</td>
</tr>
<tr>
<th scope="row">234.5</th>
<td align="right">17.42958</td>
<td align="right">17.81456</td>
<td align="right">18.46773</td>
<td align="right">19.76658</td>
<td align="right">21.65006</td>
<td align="right">24.31427</td>
<td align="right">26.29911</td>
<td align="right">28.00399</td>
<td align="right">31.40154</td>
<td align="right">34.54273</td>
</tr>
<tr>
<th scope="row">235.5</th>
<td align="right">17.43278</td>
<td align="right">17.81852</td>
<td align="right">18.47308</td>
<td align="right">19.77505</td>
<td align="right">21.66397</td>
<td align="right">24.33798</td>
<td align="right">26.33189</td>
<td align="right">28.04591</td>
<td align="right">31.46583</td>
<td align="right">34.63326</td>
</tr>
<tr>
<th scope="row">236.5</th>
<td align="right">17.43465</td>
<td align="right">17.82119</td>
<td align="right">18.47722</td>
<td align="right">19.78248</td>
<td align="right">21.67712</td>
<td align="right">24.3613</td>
<td align="right">26.36459</td>
<td align="right">28.08801</td>
<td align="right">31.53085</td>
<td align="right">34.72503</td>
</tr>
<tr>
<th scope="row">237.5</th>
<td align="right">17.43515</td>
<td align="right">17.82256</td>
<td align="right">18.48014</td>
<td align="right">19.78887</td>
<td align="right">21.68949</td>
<td align="right">24.38426</td>
<td align="right">26.39723</td>
<td align="right">28.13034</td>
<td align="right">31.59664</td>
<td align="right">34.8181</td>
</tr>
<tr>
<th scope="row">238.5</th>
<td align="right">17.43427</td>
<td align="right">17.82259</td>
<td align="right">18.48182</td>
<td align="right">19.7942</td>
<td align="right">21.70108</td>
<td align="right">24.40686</td>
<td align="right">26.42984</td>
<td align="right">28.17291</td>
<td align="right">31.66324</td>
<td align="right">34.9125</td>
</tr>
<tr>
<th scope="row">239.5</th>
<td align="right">17.43199</td>
<td align="right">17.82127</td>
<td align="right">18.48223</td>
<td align="right">19.79846</td>
<td align="right">21.71189</td>
<td align="right">24.4291</td>
<td align="right">26.46243</td>
<td align="right">28.21574</td>
<td align="right">31.73069</td>
<td align="right">35.00831</td>
</tr>
<tr>
<th scope="row">240</th>
<td align="right">17.43031</td>
<td align="right">17.82009</td>
<td align="right">18.48196</td>
<td align="right">19.80018</td>
<td align="right">21.717</td>
<td align="right">24.4401</td>
<td align="right">26.47872</td>
<td align="right">28.23727</td>
<td align="right">31.76474</td>
<td align="right">35.05675</td>
</tr>
<tr>
<th scope="row">240.5</th>
<td align="right">17.42827</td>
<td align="right">17.81856</td>
<td align="right">18.48136</td>
<td align="right">19.80162</td>
<td align="right">21.72191</td>
<td align="right">24.45101</td>
<td align="right">26.49502</td>
<td align="right">28.25888</td>
<td align="right">31.79903</td>
<td align="right">35.10556</td>
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

