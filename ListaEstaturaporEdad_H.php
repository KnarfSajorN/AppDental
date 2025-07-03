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
                    <th scope="col">3rd Percentile Length (in centimeters)</th>
                    <th scope="col">5th Percentile Length (in centimeters)</th>
                    <th scope="col">10th Percentile Length (in centimeters)</th>
                    <th scope="col">25th Percentile Length (in centimeters)</th>
                    <th scope="col">50th Percentile Length (in centimeters)</th>
                    <th scope="col">75th Percentile Length (in centimeters)</th>
                    <th scope="col">90th Percentile Length (in centimeters)</th>
                    <th scope="col">95th Percentile Length (in centimeters)</th>
                    <th scope="col">97th Percentile Length (in centimeters)</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
<th scope="row">0</th>
<td>44.9251</td>
<td>45.56841</td>
<td>46.55429</td>
<td>48.18937</td>
<td>49.98888</td>
<td>51.77126</td>
<td>53.36153</td>
<td>54.30721</td>
<td>54.919</td>
</tr>
<tr>
<th scope="row">0.5</th>
<td>47.97812</td>
<td>48.55809</td>
<td>49.4578</td>
<td>50.97919</td>
<td>52.69598</td>
<td>54.44054</td>
<td>56.03444</td>
<td>56.99908</td>
<td>57.62984</td>
</tr>
<tr>
<th scope="row">1.5</th>
<td>52.19859</td>
<td>52.72611</td>
<td>53.55365</td>
<td>54.9791</td>
<td>56.62843</td>
<td>58.35059</td>
<td>59.9664</td>
<td>60.96465</td>
<td>61.62591</td>
</tr>
<tr>
<th scope="row">2.5</th>
<td>55.26322</td>
<td>55.77345</td>
<td>56.57772</td>
<td>57.9744</td>
<td>59.60895</td>
<td>61.33788</td>
<td>62.98158</td>
<td>64.00789</td>
<td>64.69241</td>
</tr>
<tr>
<th scope="row">3.5</th>
<td>57.73049</td>
<td>58.23744</td>
<td>59.0383</td>
<td>60.43433</td>
<td>62.077</td>
<td>63.82543</td>
<td>65.49858</td>
<td>66.54889</td>
<td>67.2519</td>
</tr>
<tr>
<th scope="row">4.5</th>
<td>59.82569</td>
<td>60.33647</td>
<td>61.1441</td>
<td>62.55409</td>
<td>64.21686</td>
<td>65.99131</td>
<td>67.69405</td>
<td>68.76538</td>
<td>69.48354</td>
</tr>
<tr>
<th scope="row">5.5</th>
<td>61.66384</td>
<td>62.18261</td>
<td>63.00296</td>
<td>64.43546</td>
<td>66.12531</td>
<td>67.92935</td>
<td>69.66122</td>
<td>70.75128</td>
<td>71.48218</td>
</tr>
<tr>
<th scope="row">6.5</th>
<td>63.31224</td>
<td>63.84166</td>
<td>64.67854</td>
<td>66.13896</td>
<td>67.86018</td>
<td>69.69579</td>
<td>71.45609</td>
<td>72.56307</td>
<td>73.30488</td>
</tr>
<tr>
<th scope="row">7.5</th>
<td>64.81395</td>
<td>65.35584</td>
<td>66.21181</td>
<td>67.70375</td>
<td>69.45908</td>
<td>71.32735</td>
<td>73.11525</td>
<td>74.23767</td>
<td>74.98899</td>
</tr>
<tr>
<th scope="row">8.5</th>
<td>66.19833</td>
<td>66.75398</td>
<td>67.63088</td>
<td>69.15682</td>
<td>70.94804</td>
<td>72.84947</td>
<td>74.6641</td>
<td>75.80074</td>
<td>76.56047</td>
</tr>
<tr>
<th scope="row">9.5</th>
<td>67.48635</td>
<td>68.05675</td>
<td>68.95591</td>
<td>70.51761</td>
<td>72.34586</td>
<td>74.2806</td>
<td>76.1211</td>
<td>77.27095</td>
<td>78.03819</td>
</tr>
<tr>
<th scope="row">10.5</th>
<td>68.6936</td>
<td>69.27949</td>
<td>70.20192</td>
<td>71.80065</td>
<td>73.66665</td>
<td>75.63462</td>
<td>77.50016</td>
<td>78.66234</td>
<td>79.43637</td>
</tr>
<tr>
<th scope="row">11.5</th>
<td>69.832</td>
<td>70.43397</td>
<td>71.38046</td>
<td>73.01712</td>
<td>74.9213</td>
<td>76.92224</td>
<td>78.81202</td>
<td>79.98578</td>
<td>80.76602</td>
</tr>
<tr>
<th scope="row">12.5</th>
<td>70.91088</td>
<td>71.52941</td>
<td>72.50055</td>
<td>74.17581</td>
<td>76.11838</td>
<td>78.15196</td>
<td>80.0652</td>
<td>81.2499</td>
<td>82.03585</td>
</tr>
<tr>
<th scope="row">13.5</th>
<td>71.9377</td>
<td>72.57318</td>
<td>73.56946</td>
<td>75.2838</td>
<td>77.2648</td>
<td>79.33061</td>
<td>81.2666</td>
<td>82.46167</td>
<td>83.25292</td>
</tr>
<tr>
<th scope="row">14.5</th>
<td>72.91853</td>
<td>73.5713</td>
<td>74.59309</td>
<td>76.34685</td>
<td>78.36622</td>
<td>80.4638</td>
<td>82.42185</td>
<td>83.6268</td>
<td>84.42302</td>
</tr>
<tr>
<th scope="row">15.5</th>
<td>73.85839</td>
<td>74.52871</td>
<td>75.57634</td>
<td>77.36973</td>
<td>79.42734</td>
<td>81.5562</td>
<td>83.53568</td>
<td>84.75006</td>
<td>85.55095</td>
</tr>
<tr>
<th scope="row">16.5</th>
<td>74.76147</td>
<td>75.44958</td>
<td>76.5233</td>
<td>78.35646</td>
<td>80.45209</td>
<td>82.61174</td>
<td>84.61204</td>
<td>85.83547</td>
<td>86.64078</td>
</tr>
<tr>
<th scope="row">17.5</th>
<td>75.63132</td>
<td>76.33742</td>
<td>77.43742</td>
<td>79.31042</td>
<td>81.44384</td>
<td>83.63377</td>
<td>85.65431</td>
<td>86.88645</td>
<td>87.69597</td>
</tr>
<tr>
<th scope="row">18.5</th>
<td>76.47096</td>
<td>77.19523</td>
<td>78.32168</td>
<td>80.23453</td>
<td>82.40544</td>
<td>84.62515</td>
<td>86.66541</td>
<td>87.90595</td>
<td>88.7195</td>
</tr>
<tr>
<th scope="row">19.5</th>
<td>77.283</td>
<td>78.0256</td>
<td>79.17863</td>
<td>81.13131</td>
<td>83.33938</td>
<td>85.58837</td>
<td>87.64786</td>
<td>88.89652</td>
<td>89.71393</td>
</tr>
<tr>
<th scope="row">20.5</th>
<td>78.06971</td>
<td>78.83077</td>
<td>80.01048</td>
<td>82.00292</td>
<td>84.24783</td>
<td>86.52562</td>
<td>88.60385</td>
<td>89.86038</td>
<td>90.68153</td>
</tr>
<tr>
<th scope="row">21.5</th>
<td>78.83308</td>
<td>79.61271</td>
<td>80.81919</td>
<td>82.85129</td>
<td>85.1327</td>
<td>87.43879</td>
<td>89.53533</td>
<td>90.79951</td>
<td>91.62428</td>
</tr>
<tr>
<th scope="row">22.5</th>
<td>79.57485</td>
<td>80.37315</td>
<td>81.60646</td>
<td>83.67811</td>
<td>85.99565</td>
<td>88.32957</td>
<td>90.44402</td>
<td>91.71563</td>
<td>92.54392</td>
</tr>
<tr>
<th scope="row">23.5</th>
<td>80.29656</td>
<td>81.11363</td>
<td>82.37381</td>
<td>84.48487</td>
<td>86.83818</td>
<td>89.19948</td>
<td>91.33143</td>
<td>92.61031</td>
<td>93.44203</td>
</tr>
<tr>
<th scope="row">24.5</th>
<td>80.99959</td>
<td>81.83552</td>
<td>83.12259</td>
<td>85.2729</td>
<td>87.66161</td>
<td>90.04985</td>
<td>92.19893</td>
<td>93.48491</td>
<td>94.31998</td>
</tr>
<tr>
<th scope="row">25.5</th>
<td>81.74464</td>
<td>82.58135</td>
<td>83.87245</td>
<td>86.03703</td>
<td>88.45247</td>
<td>90.8787</td>
<td>93.07143</td>
<td>94.38775</td>
<td>95.24419</td>
</tr>
<tr>
<th scope="row">26.5</th>
<td>82.47365</td>
<td>83.31105</td>
<td>84.60576</td>
<td>86.78329</td>
<td>89.22326</td>
<td>91.68468</td>
<td>93.91817</td>
<td>95.263</td>
<td>96.13962</td>
</tr>
<tr>
<th scope="row">27.5</th>
<td>83.18812</td>
<td>84.02609</td>
<td>85.32399</td>
<td>87.51317</td>
<td>89.97549</td>
<td>92.46929</td>
<td>94.74064</td>
<td>96.1121</td>
<td>97.00763</td>
</tr>
<tr>
<th scope="row">28.5</th>
<td>83.88931</td>
<td>84.72769</td>
<td>86.02833</td>
<td>88.22788</td>
<td>90.71041</td>
<td>93.23385</td>
<td>95.54016</td>
<td>96.93639</td>
<td>97.84957</td>
</tr>
<tr>
<th scope="row">29.5</th>
<td>84.57826</td>
<td>85.41688</td>
<td>86.71978</td>
<td>88.9284</td>
<td>91.42908</td>
<td>93.97951</td>
<td>96.318</td>
<td>97.73717</td>
<td>98.66677</td>
</tr>
<tr>
<th scope="row">30.5</th>
<td>85.25589</td>
<td>86.09452</td>
<td>87.39917</td>
<td>89.6156</td>
<td>92.13242</td>
<td>94.70732</td>
<td>97.07531</td>
<td>98.51569</td>
<td>99.46052</td>
</tr>
<tr>
<th scope="row">31.5</th>
<td>85.92294</td>
<td>86.76134</td>
<td>88.06723</td>
<td>90.2902</td>
<td>92.82127</td>
<td>95.41824</td>
<td>97.81324</td>
<td>99.27318</td>
<td>100.2321</td>
</tr>
<tr>
<th scope="row">32.5</th>
<td>86.58009</td>
<td>87.41799</td>
<td>88.72457</td>
<td>90.95287</td>
<td>93.49638</td>
<td>96.11319</td>
<td>98.53287</td>
<td>100.0109</td>
<td>100.9829</td>
</tr>
<tr>
<th scope="row">33.5</th>
<td>87.22791</td>
<td>88.06503</td>
<td>89.37177</td>
<td>91.60421</td>
<td>94.15847</td>
<td>96.79307</td>
<td>99.23531</td>
<td>100.73</td>
<td>101.7142</td>
</tr>
<tr>
<th scope="row">34.5</th>
<td>87.86696</td>
<td>88.70301</td>
<td>90.00937</td>
<td>92.24482</td>
<td>94.80823</td>
<td>97.45873</td>
<td>99.92162</td>
<td>101.4318</td>
<td>102.4274</td>
</tr>

<tr>
<th scope="row">35.5</th>
<td>88.12685</td>
<td>88.95804</td>
<td>90.25833</td>
<td>92.48602</td>
<td>95.04637</td>
<td>97.69991</td>
<td>100.17134</td>
<td>101.68945</td>
<td>102.6915</td>
</tr>

<tr>
<th scope="row">36.5</th>
<td>88.37864</td>
<td>89.20473</td>
<td>90.49789</td>
<td>92.71756</td>
<td>95.27359</td>
<td>97.9287</td>
<td>100.4072</td>
<td>101.9324</td>
<td>102.9402</td>
</tr>
<tr>
<th scope="row">37.5</th>
<td>88.93297</td>
<td>89.77301</td>
<td>91.08608</td>
<td>93.3344</td>
<td>95.91475</td>
<td>98.58525</td>
<td>101.069</td>
<td>102.593</td>
<td>103.5983</td>
</tr>
<tr>
<th scope="row">38.5</th>
<td>89.47916</td>
<td>90.33306</td>
<td>91.66589</td>
<td>93.94268</td>
<td>96.54734</td>
<td>99.23358</td>
<td>101.7234</td>
<td>103.247</td>
<td>104.2503</td>
</tr>
<tr>
<th scope="row">39.5</th>
<td>90.01766</td>
<td>90.88532</td>
<td>92.23779</td>
<td>94.54291</td>
<td>97.17191</td>
<td>99.87426</td>
<td>102.3709</td>
<td>103.8948</td>
<td>104.8967</td>
</tr>
<tr>
<th scope="row">40.5</th>
<td>90.54891</td>
<td>91.43025</td>
<td>92.80225</td>
<td>95.13557</td>
<td>97.78898</td>
<td>100.5078</td>
<td>103.012</td>
<td>104.537</td>
<td>105.538</td>
</tr>
<tr>
<th scope="row">41.5</th>
<td>91.07337</td>
<td>91.96832</td>
<td>93.35972</td>
<td>95.72115</td>
<td>98.39903</td>
<td>101.1348</td>
<td>103.6473</td>
<td>105.1739</td>
<td>106.1747</td>
</tr>
<tr>
<th scope="row">42.5</th>
<td>91.59152</td>
<td>92.49999</td>
<td>93.91068</td>
<td>96.30009</td>
<td>99.00254</td>
<td>101.7556</td>
<td>104.2771</td>
<td>105.8061</td>
<td>106.8071</td>
</tr>
<tr>
<th scope="row">43.5</th>
<td>92.10382</td>
<td>93.0257</td>
<td>94.45556</td>
<td>96.87286</td>
<td>99.59998</td>
<td>102.3708</td>
<td>104.9021</td>
<td>106.434</td>
<td>107.4357</td>
</tr>
<tr>
<th scope="row">44.5</th>
<td>92.61073</td>
<td>93.54592</td>
<td>94.99482</td>
<td>97.43989</td>
<td>100.1918</td>
<td>102.9807</td>
<td>105.5225</td>
<td>107.0579</td>
<td>108.0609</td>
</tr>
<tr>
<th scope="row">45.5</th>
<td>93.11271</td>
<td>94.06109</td>
<td>95.52888</td>
<td>98.00159</td>
<td>100.7783</td>
<td>103.5858</td>
<td>106.1387</td>
<td>107.6784</td>
<td>108.683</td>
</tr>
<tr>
<th scope="row">46.5</th>
<td>93.61022</td>
<td>94.57166</td>
<td>96.05817</td>
<td>98.55838</td>
<td>101.36</td>
<td>104.1865</td>
<td>106.7513</td>
<td>108.2956</td>
<td>109.3024</td>
</tr>
<tr>
<th scope="row">47.5</th>
<td>94.10371</td>
<td>95.07806</td>
<td>96.5831</td>
<td>99.11064</td>
<td>101.9373</td>
<td>104.7831</td>
<td>107.3604</td>
<td>108.9101</td>
<td>109.9193</td>
</tr>
<tr>
<th scope="row">48.5</th>
<td>94.59361</td>
<td>95.5807</td>
<td>97.10407</td>
<td>99.65875</td>
<td>102.5105</td>
<td>105.3759</td>
<td>107.9665</td>
<td>109.522</td>
<td>110.5342</td>
</tr>
<tr>
<th scope="row">49.5</th>
<td>95.08035</td>
<td>96.08</td>
<td>97.62147</td>
<td>100.2031</td>
<td>103.0799</td>
<td>105.9654</td>
<td>108.5698</td>
<td>110.1317</td>
<td>111.1473</td>
</tr>
<tr>
<th scope="row">50.5</th>
<td>95.56435</td>
<td>96.57635</td>
<td>98.13566</td>
<td>100.7439</td>
<td>103.6459</td>
<td>106.5518</td>
<td>109.1706</td>
<td>110.7394</td>
<td>111.7588</td>
</tr>
<tr>
<th scope="row">51.5</th>
<td>96.046</td>
<td>97.07013</td>
<td>98.64701</td>
<td>101.2817</td>
<td>104.2087</td>
<td>107.1354</td>
<td>109.7693</td>
<td>111.3454</td>
<td>112.369</td>
</tr>
<tr>
<th scope="row">52.5</th>
<td>96.52568</td>
<td>97.5617</td>
<td>99.15585</td>
<td>101.8166</td>
<td>104.7687</td>
<td>107.7165</td>
<td>110.366</td>
<td>111.95</td>
<td>112.9781</td>
</tr>
<tr>
<th scope="row">53.5</th>
<td>97.00376</td>
<td>98.05141</td>
<td>99.6625</td>
<td>102.3491</td>
<td>105.3262</td>
<td>108.2953</td>
<td>110.9609</td>
<td>112.5533</td>
<td>113.5863</td>
</tr>
<tr>
<th scope="row">54.5</th>
<td>97.48058</td>
<td>98.53958</td>
<td>100.1673</td>
<td>102.8792</td>
<td>105.8813</td>
<td>108.872</td>
<td>111.5543</td>
<td>113.1555</td>
<td>114.1937</td>
</tr>
<tr>
<th scope="row">55.5</th>
<td>97.95648</td>
<td>99.02654</td>
<td>100.6705</td>
<td>103.4074</td>
<td>106.4343</td>
<td>109.4469</td>
<td>112.1464</td>
<td>113.7568</td>
<td>114.8006</td>
</tr>
<tr>
<th scope="row">56.5</th>
<td>98.43175</td>
<td>99.51256</td>
<td>101.1723</td>
<td>103.9339</td>
<td>106.9855</td>
<td>110.0201</td>
<td>112.7374</td>
<td>114.3574</td>
<td>115.4072</td>
</tr>
<tr>
<th scope="row">57.5</th>
<td>98.90667</td>
<td>99.99791</td>
<td>101.6731</td>
<td>104.4588</td>
<td>107.535</td>
<td>110.5919</td>
<td>113.3273</td>
<td>114.9575</td>
<td>116.0134</td>
</tr>
<tr>
<th scope="row">58.5</th>
<td>99.38151</td>
<td>100.4828</td>
<td>102.173</td>
<td>104.9825</td>
<td>108.083</td>
<td>111.1623</td>
<td>113.9164</td>
<td>115.557</td>
<td>116.6194</td>
</tr>
<tr>
<th scope="row">59.5</th>
<td>99.8565</td>
<td>100.9676</td>
<td>102.6723</td>
<td>105.505</td>
<td>108.6296</td>
<td>111.7316</td>
<td>114.5047</td>
<td>116.1561</td>
<td>117.2254</td>
</tr>
<tr>
<th scope="row">60.5</th>
<td>100.3318</td>
<td>101.4523</td>
<td>103.1712</td>
<td>106.0265</td>
<td>109.1751</td>
<td>112.2998</td>
<td>115.0924</td>
<td>116.755</td>
<td>117.8314</td>
</tr>
<tr>
<th scope="row">61.5</th>
<td>100.8077</td>
<td>101.9372</td>
<td>103.6697</td>
<td>106.5472</td>
<td>109.7196</td>
<td>112.8671</td>
<td>115.6795</td>
<td>117.3536</td>
<td>118.4374</td>
</tr>
<tr>
<th scope="row">62.5</th>
<td>101.2843</td>
<td>102.4225</td>
<td>104.1682</td>
<td>107.0673</td>
<td>110.2631</td>
<td>113.4335</td>
<td>116.2661</td>
<td>117.9521</td>
<td>119.0435</td>
</tr>
<tr>
<th scope="row">63.5</th>
<td>101.7618</td>
<td>102.9082</td>
<td>104.6666</td>
<td>107.5868</td>
<td>110.8058</td>
<td>113.9992</td>
<td>116.8522</td>
<td>118.5505</td>
<td>119.6498</td>
</tr>
<tr>
<th scope="row">64.5</th>
<td>102.2401</td>
<td>103.3945</td>
<td>105.1651</td>
<td>108.1058</td>
<td>111.3477</td>
<td>114.5641</td>
<td>117.438</td>
<td>119.1487</td>
<td>120.2562</td>
</tr>
<tr>
<th scope="row">65.5</th>
<td>102.7195</td>
<td>103.8814</td>
<td>105.6638</td>
<td>108.6244</td>
<td>111.889</td>
<td>115.1284</td>
<td>118.0234</td>
<td>119.7469</td>
<td>120.8627</td>
</tr>
<tr>
<th scope="row">66.5</th>
<td>103.2</td>
<td>104.369</td>
<td>106.1627</td>
<td>109.1427</td>
<td>112.4296</td>
<td>115.6921</td>
<td>118.6084</td>
<td>120.345</td>
<td>121.4694</td>
</tr>
<tr>
<th scope="row">67.5</th>
<td>103.6815</td>
<td>104.8574</td>
<td>106.6619</td>
<td>109.6607</td>
<td>112.9696</td>
<td>116.2551</td>
<td>119.1931</td>
<td>120.943</td>
<td>122.0761</td>
</tr>
<tr>
<th scope="row">68.5</th>
<td>104.1642</td>
<td>105.3466</td>
<td>107.1614</td>
<td>110.1785</td>
<td>113.509</td>
<td>116.8176</td>
<td>119.7774</td>
<td>121.5408</td>
<td>122.6829</td>
</tr>
<tr>
<th scope="row">69.5</th>
<td>104.6479</td>
<td>105.8364</td>
<td>107.6611</td>
<td>110.696</td>
<td>114.0479</td>
<td>117.3794</td>
<td>120.3613</td>
<td>122.1384</td>
<td>123.2897</td>
</tr>
<tr>
<th scope="row">70.5</th>
<td>105.1326</td>
<td>106.327</td>
<td>108.1612</td>
<td>111.2132</td>
<td>114.5861</td>
<td>117.9407</td>
<td>120.9447</td>
<td>122.7359</td>
<td>123.8965</td>
</tr>
<tr>
<th scope="row">71.5</th>
<td>105.6183</td>
<td>106.8182</td>
<td>108.6614</td>
<td>111.7302</td>
<td>115.1238</td>
<td>118.5012</td>
<td>121.5277</td>
<td>123.333</td>
<td>124.5031</td>
</tr>
<tr>
<th scope="row">72.5</th>
<td>106.1048</td>
<td>107.3099</td>
<td>109.1619</td>
<td>112.2469</td>
<td>115.6609</td>
<td>119.0611</td>
<td>122.1101</td>
<td>123.9297</td>
<td>125.1095</td>
</tr>
<tr>
<th scope="row">73.5</th>
<td>106.5921</td>
<td>107.8021</td>
<td>109.6624</td>
<td>112.7631</td>
<td>116.1973</td>
<td>119.6203</td>
<td>122.6918</td>
<td>124.526</td>
<td>125.7156</td>
</tr>
<tr>
<th scope="row">74.5</th>
<td>107.0799</td>
<td>108.2946</td>
<td>110.1629</td>
<td>113.2789</td>
<td>116.7329</td>
<td>120.1786</td>
<td>123.2729</td>
<td>125.1217</td>
<td>126.3212</td>
</tr>
<tr>
<th scope="row">75.5</th>
<td>107.5682</td>
<td>108.7873</td>
<td>110.6633</td>
<td>113.7942</td>
<td>117.2678</td>
<td>120.7361</td>
<td>123.8532</td>
<td>125.7168</td>
<td>126.9263</td>
</tr>
<tr>
<th scope="row">76.5</th>
<td>108.0566</td>
<td>109.2801</td>
<td>111.1634</td>
<td>114.3089</td>
<td>117.8018</td>
<td>121.2926</td>
<td>124.4327</td>
<td>126.3111</td>
<td>127.5307</td>
</tr>
<tr>
<th scope="row">77.5</th>
<td>108.5451</td>
<td>109.7727</td>
<td>111.6631</td>
<td>114.8229</td>
<td>118.3348</td>
<td>121.848</td>
<td>125.0111</td>
<td>126.9045</td>
<td>128.1344</td>
</tr>
<tr>
<th scope="row">78.5</th>
<td>109.0335</td>
<td>110.2649</td>
<td>112.1623</td>
<td>115.336</td>
<td>118.8668</td>
<td>122.4024</td>
<td>125.5884</td>
<td>127.4969</td>
<td>128.7371</td>
</tr>
<tr>
<th scope="row">79.5</th>
<td>109.5214</td>
<td>110.7566</td>
<td>112.6608</td>
<td>115.8481</td>
<td>119.3977</td>
<td>122.9555</td>
<td>126.1646</td>
<td>128.0882</td>
<td>129.3387</td>
</tr>
<tr>
<th scope="row">80.5</th>
<td>110.0086</td>
<td>111.2476</td>
<td>113.1583</td>
<td>116.3592</td>
<td>119.9272</td>
<td>123.5073</td>
<td>126.7394</td>
<td>128.6782</td>
<td>129.9391</td>
</tr>
<tr>
<th scope="row">81.5</th>
<td>110.495</td>
<td>111.7375</td>
<td>113.6548</td>
<td>116.869</td>
<td>120.4554</td>
<td>124.0576</td>
<td>127.3128</td>
<td>129.2668</td>
<td>130.5381</td>
</tr>
<tr>
<th scope="row">82.5</th>
<td>110.9801</td>
<td>112.2263</td>
<td>114.1499</td>
<td>117.3774</td>
<td>120.9821</td>
<td>124.6064</td>
<td>127.8846</td>
<td>129.8538</td>
<td>131.1356</td>
</tr>
<tr>
<th scope="row">83.5</th>
<td>111.4638</td>
<td>112.7135</td>
<td>114.6436</td>
<td>117.8842</td>
<td>121.5072</td>
<td>125.1535</td>
<td>128.4547</td>
<td>130.4392</td>
<td>131.7314</td>
</tr>
<tr>
<th scope="row">84.5</th>
<td>111.9459</td>
<td>113.1991</td>
<td>115.1356</td>
<td>118.3893</td>
<td>122.0305</td>
<td>125.6987</td>
<td>129.023</td>
<td>131.0226</td>
<td>132.3253</td>
</tr>
<tr>
<th scope="row">85.5</th>
<td>112.4259</td>
<td>113.6827</td>
<td>115.6257</td>
<td>118.8926</td>
<td>122.552</td>
<td>126.2421</td>
<td>129.5893</td>
<td>131.6041</td>
<td>132.9172</td>
</tr>
<tr>
<th scope="row">86.5</th>
<td>112.9036</td>
<td>114.1642</td>
<td>116.1136</td>
<td>119.3938</td>
<td>123.0714</td>
<td>126.7834</td>
<td>130.1535</td>
<td>132.1834</td>
<td>133.507</td>
</tr>
<tr>
<th scope="row">87.5</th>
<td>113.3789</td>
<td>114.6431</td>
<td>116.5992</td>
<td>119.8927</td>
<td>123.5886</td>
<td>127.3225</td>
<td>130.7154</td>
<td>132.7605</td>
<td>134.0943</td>
</tr>
<tr>
<th scope="row">88.5</th>
<td>113.8513</td>
<td>115.1194</td>
<td>117.0822</td>
<td>120.3893</td>
<td>124.1035</td>
<td>127.8594</td>
<td>131.275</td>
<td>133.335</td>
<td>134.6792</td>
</tr>
<tr>
<th scope="row">89.5</th>
<td>114.3206</td>
<td>115.5927</td>
<td>117.5625</td>
<td>120.8833</td>
<td>124.616</td>
<td>128.3937</td>
<td>131.8321</td>
<td>133.907</td>
<td>135.2615</td>
</tr>
<tr>
<th scope="row">90.5</th>
<td>114.7867</td>
<td>116.0629</td>
<td>118.0398</td>
<td>121.3746</td>
<td>125.1259</td>
<td>128.9256</td>
<td>132.3865</td>
<td>134.4763</td>
<td>135.8409</td>
</tr>
<tr>
<th scope="row">91.5</th>
<td>115.2491</td>
<td>116.5297</td>
<td>118.5139</td>
<td>121.863</td>
<td>125.6331</td>
<td>129.4547</td>
<td>132.9381</td>
<td>135.0426</td>
<td>136.4173</td>
</tr>
<tr>
<th scope="row">92.5</th>
<td>115.7077</td>
<td>116.9928</td>
<td>118.9847</td>
<td>122.3483</td>
<td>126.1374</td>
<td>129.981</td>
<td>133.4868</td>
<td>135.606</td>
<td>136.9906</td>
</tr>
<tr>
<th scope="row">93.5</th>
<td>116.1623</td>
<td>117.4521</td>
<td>119.4519</td>
<td>122.8305</td>
<td>126.6388</td>
<td>130.5044</td>
<td>134.0325</td>
<td>136.1662</td>
<td>137.5607</td>
</tr>
<tr>
<th scope="row">94.5</th>
<td>116.6127</td>
<td>117.9074</td>
<td>119.9153</td>
<td>123.3092</td>
<td>127.137</td>
<td>131.0247</td>
<td>134.5751</td>
<td>136.7231</td>
<td>138.1274</td>
</tr>
<tr>
<th scope="row">95.5</th>
<td>117.0587</td>
<td>118.3585</td>
<td>120.3749</td>
<td>123.7845</td>
<td>127.632</td>
<td>131.5419</td>
<td>135.1144</td>
<td>137.2767</td>
<td>138.6906</td>
</tr>
<tr>
<th scope="row">96.5</th>
<td>117.5</td>
<td>118.8053</td>
<td>120.8305</td>
<td>124.2562</td>
<td>128.1237</td>
<td>132.0559</td>
<td>135.6504</td>
<td>137.8267</td>
<td>139.2502</td>
</tr>
<tr>
<th scope="row">97.5</th>
<td>117.9366</td>
<td>119.2475</td>
<td>121.2819</td>
<td>124.7242</td>
<td>128.6119</td>
<td>132.5664</td>
<td>136.1829</td>
<td>138.3731</td>
<td>139.806</td>
</tr>
<tr>
<th scope="row">98.5</th>
<td>118.3683</td>
<td>119.6851</td>
<td>121.729</td>
<td>125.1882</td>
<td>129.0966</td>
<td>133.0736</td>
<td>136.7118</td>
<td>138.9159</td>
<td>140.358</td>
</tr>
<tr>
<th scope="row">99.5</th>
<td>118.7949</td>
<td>120.1179</td>
<td>122.1716</td>
<td>125.6484</td>
<td>129.5777</td>
<td>133.5771</td>
<td>137.2371</td>
<td>139.4548</td>
<td>140.9062</td>
</tr>
<tr>
<th scope="row">100.5</th>
<td>119.2165</td>
<td>120.5459</td>
<td>122.6099</td>
<td>126.1045</td>
<td>130.055</td>
<td>134.0771</td>
<td>137.7587</td>
<td>139.9899</td>
<td>141.4503</td>
</tr>
<tr>
<th scope="row">101.5</th>
<td>119.633</td>
<td>120.969</td>
<td>123.0435</td>
<td>126.5565</td>
<td>130.5286</td>
<td>134.5734</td>
<td>138.2765</td>
<td>140.5211</td>
<td>141.9904</td>
</tr>
<tr>
<th scope="row">102.5</th>
<td>120.0442</td>
<td>121.3872</td>
<td>123.4726</td>
<td>127.0044</td>
<td>130.9983</td>
<td>135.066</td>
<td>138.7905</td>
<td>141.0484</td>
<td>142.5263</td>
</tr>
<tr>
<th scope="row">103.5</th>
<td>120.4502</td>
<td>121.8004</td>
<td>123.897</td>
<td>127.4481</td>
<td>131.4641</td>
<td>135.5548</td>
<td>139.3006</td>
<td>141.5716</td>
<td>143.0582</td>
</tr>
<tr>
<th scope="row">104.5</th>
<td>120.851</td>
<td>122.2086</td>
<td>124.3168</td>
<td>127.8876</td>
<td>131.926</td>
<td>136.0397</td>
<td>139.8069</td>
<td>142.0908</td>
<td>143.586</td>
</tr>
<tr>
<th scope="row">105.5</th>
<td>121.2467</td>
<td>122.6119</td>
<td>124.7319</td>
<td>128.3228</td>
<td>132.384</td>
<td>136.5209</td>
<td>140.3093</td>
<td>142.6061</td>
<td>144.1096</td>
</tr>
<tr>
<th scope="row">106.5</th>
<td>121.6372</td>
<td>123.0103</td>
<td>125.1425</td>
<td>128.7539</td>
<td>132.8381</td>
<td>136.9982</td>
<td>140.8077</td>
<td>143.1173</td>
<td>144.6291</td>
</tr>
<tr>
<th scope="row">107.5</th>
<td>122.0228</td>
<td>123.4039</td>
<td>125.5485</td>
<td>129.1807</td>
<td>133.2882</td>
<td>137.4717</td>
<td>141.3023</td>
<td>143.6245</td>
<td>145.1445</td>
</tr>
<tr>
<th scope="row">108.5</th>
<td>122.4034</td>
<td>123.7928</td>
<td>125.9501</td>
<td>129.6035</td>
<td>133.7345</td>
<td>137.9414</td>
<td>141.793</td>
<td>144.1278</td>
<td>145.656</td>
</tr>
<tr>
<th scope="row">109.5</th>
<td>122.7793</td>
<td>124.1771</td>
<td>126.3473</td>
<td>130.0222</td>
<td>134.1769</td>
<td>138.4073</td>
<td>142.28</td>
<td>144.6272</td>
<td>146.1634</td>
</tr>
<tr>
<th scope="row">110.5</th>
<td>123.1506</td>
<td>124.5569</td>
<td>126.7402</td>
<td>130.4369</td>
<td>134.6155</td>
<td>138.8696</td>
<td>142.7632</td>
<td>145.1228</td>
<td>146.6671</td>
</tr>
<tr>
<th scope="row">111.5</th>
<td>123.5175</td>
<td>124.9325</td>
<td>127.1291</td>
<td>130.8477</td>
<td>135.0504</td>
<td>139.3282</td>
<td>143.2428</td>
<td>145.6148</td>
<td>147.167</td>
</tr>
<tr>
<th scope="row">112.5</th>
<td>123.8803</td>
<td>125.304</td>
<td>127.514</td>
<td>131.2548</td>
<td>135.4818</td>
<td>139.7833</td>
<td>143.7188</td>
<td>146.1032</td>
<td>147.6633</td>
</tr>
<tr>
<th scope="row">113.5</th>
<td>124.2391</td>
<td>125.6717</td>
<td>127.8953</td>
<td>131.6584</td>
<td>135.9097</td>
<td>140.235</td>
<td>144.1915</td>
<td>146.5882</td>
<td>148.1562</td>
</tr>
<tr>
<th scope="row">114.5</th>
<td>124.5943</td>
<td>126.0358</td>
<td>128.273</td>
<td>132.0585</td>
<td>136.3343</td>
<td>140.6835</td>
<td>144.661</td>
<td>147.0699</td>
<td>148.6459</td>
</tr>
<tr>
<th scope="row">115.5</th>
<td>124.9462</td>
<td>126.3966</td>
<td>128.6474</td>
<td>132.4555</td>
<td>136.7557</td>
<td>141.1289</td>
<td>145.1273</td>
<td>147.5486</td>
<td>149.1325</td>
</tr>
<tr>
<th scope="row">116.5</th>
<td>125.295</td>
<td>126.7544</td>
<td>129.0189</td>
<td>132.8495</td>
<td>137.1742</td>
<td>141.5713</td>
<td>145.5909</td>
<td>148.0245</td>
<td>149.6163</td>
</tr>
<tr>
<th scope="row">117.5</th>
<td>125.6413</td>
<td>127.1096</td>
<td>129.3876</td>
<td>133.2407</td>
<td>137.5899</td>
<td>142.0111</td>
<td>146.0518</td>
<td>148.4979</td>
<td>150.0977</td>
</tr>
<tr>
<th scope="row">118.5</th>
<td>125.9852</td>
<td>127.4624</td>
<td>129.754</td>
<td>133.6295</td>
<td>138.0032</td>
<td>142.4484</td>
<td>146.5103</td>
<td>148.9689</td>
<td>150.5767</td>
</tr>
<tr>
<th scope="row">119.5</th>
<td>126.3272</td>
<td>127.8132</td>
<td>130.1183</td>
<td>134.0161</td>
<td>138.4143</td>
<td>142.8835</td>
<td>146.9668</td>
<td>149.438</td>
<td>151.0539</td>
</tr>
<tr>
<th scope="row">120.5</th>
<td>126.6678</td>
<td>128.1625</td>
<td>130.4809</td>
<td>134.4008</td>
<td>138.8234</td>
<td>143.3168</td>
<td>147.4214</td>
<td>149.9053</td>
<td>151.5294</td>
</tr>
<tr>
<th scope="row">121.5</th>
<td>127.0073</td>
<td>128.5106</td>
<td>130.8422</td>
<td>134.7841</td>
<td>139.231</td>
<td>143.7484</td>
<td>147.8747</td>
<td>150.3714</td>
<td>152.0038</td>
</tr>
<tr>
<th scope="row">122.5</th>
<td>127.3462</td>
<td>128.8579</td>
<td>131.2026</td>
<td>135.1663</td>
<td>139.6373</td>
<td>144.1789</td>
<td>148.3268</td>
<td>150.8365</td>
<td>152.4773</td>
</tr>
<tr>
<th scope="row">123.5</th>
<td>127.6851</td>
<td>129.2051</td>
<td>131.5625</td>
<td>135.5477</td>
<td>140.0427</td>
<td>144.6085</td>
<td>148.7782</td>
<td>151.301</td>
<td>152.9504</td>
</tr>
<tr>
<th scope="row">124.5</th>
<td>128.0243</td>
<td>129.5524</td>
<td>131.9224</td>
<td>135.9288</td>
<td>140.4477</td>
<td>145.0377</td>
<td>149.2294</td>
<td>151.7655</td>
<td>153.4235</td>
</tr>
<tr>
<th scope="row">125.5</th>
<td>128.3643</td>
<td>129.9004</td>
<td>132.2828</td>
<td>136.3101</td>
<td>140.8527</td>
<td>145.4669</td>
<td>149.6808</td>
<td>152.2303</td>
<td>153.8972</td>
</tr>
<tr>
<th scope="row">126.5</th>
<td>128.7058</td>
<td>130.2496</td>
<td>132.6441</td>
<td>136.692</td>
<td>141.2582</td>
<td>145.8965</td>
<td>150.1329</td>
<td>152.696</td>
<td>154.3718</td>
</tr>
<tr>
<th scope="row">127.5</th>
<td>129.0491</td>
<td>130.6005</td>
<td>133.0068</td>
<td>137.075</td>
<td>141.6646</td>
<td>146.3272</td>
<td>150.5861</td>
<td>153.1631</td>
<td>154.848</td>
</tr>
<tr>
<th scope="row">128.5</th>
<td>129.3949</td>
<td>130.9536</td>
<td>133.3714</td>
<td>137.4597</td>
<td>142.0725</td>
<td>146.7593</td>
<td>151.041</td>
<td>153.6321</td>
<td>155.3263</td>
</tr>
<tr>
<th scope="row">129.5</th>
<td>129.7436</td>
<td>131.3094</td>
<td>133.7386</td>
<td>137.8466</td>
<td>142.4824</td>
<td>147.1936</td>
<td>151.4982</td>
<td>154.1035</td>
<td>155.8072</td>
</tr>
<tr>
<th scope="row">130.5</th>
<td>130.0958</td>
<td>131.6686</td>
<td>134.1089</td>
<td>138.2362</td>
<td>142.8949</td>
<td>147.6305</td>
<td>151.9583</td>
<td>154.578</td>
<td>156.2913</td>
</tr>
<tr>
<th scope="row">131.5</th>
<td>130.452</td>
<td>132.0316</td>
<td>134.4828</td>
<td>138.6292</td>
<td>143.3107</td>
<td>148.0707</td>
<td>152.4218</td>
<td>155.0562</td>
<td>156.7792</td>
</tr>
<tr>
<th scope="row">132.5</th>
<td>130.8127</td>
<td>132.399</td>
<td>134.8608</td>
<td>139.0262</td>
<td>143.7304</td>
<td>148.5147</td>
<td>152.8894</td>
<td>155.5386</td>
<td>157.2715</td>
</tr>
<tr>
<th scope="row">133.5</th>
<td>131.1785</td>
<td>132.7714</td>
<td>135.2437</td>
<td>139.4278</td>
<td>144.1545</td>
<td>148.9633</td>
<td>153.3617</td>
<td>156.0258</td>
<td>157.7688</td>
</tr>
<tr>
<th scope="row">134.5</th>
<td>131.5498</td>
<td>133.1491</td>
<td>135.6318</td>
<td>139.8346</td>
<td>144.5838</td>
<td>149.4172</td>
<td>153.8394</td>
<td>156.5186</td>
<td>158.2717</td>
</tr>
<tr>
<th scope="row">135.5</th>
<td>131.9272</td>
<td>133.5329</td>
<td>136.026</td>
<td>140.2472</td>
<td>145.019</td>
<td>149.8769</td>
<td>154.323</td>
<td>157.0174</td>
<td>158.7806</td>
</tr>
<tr>
<th scope="row">136.5</th>
<td>132.311</td>
<td>133.9232</td>
<td>136.4266</td>
<td>140.6664</td>
<td>145.4607</td>
<td>150.3433</td>
<td>154.8133</td>
<td>157.5229</td>
<td>159.2964</td>
</tr>
<tr>
<th scope="row">137.5</th>
<td>132.7018</td>
<td>134.3205</td>
<td>136.8343</td>
<td>141.0928</td>
<td>145.9097</td>
<td>150.8169</td>
<td>155.3109</td>
<td>158.0356</td>
<td>159.8193</td>
</tr>
<tr>
<th scope="row">138.5</th>
<td>133.1</td>
<td>134.7252</td>
<td>137.2496</td>
<td>141.5269</td>
<td>146.3665</td>
<td>151.2984</td>
<td>155.8164</td>
<td>158.5562</td>
<td>160.35</td>
</tr>
<tr>
<th scope="row">139.5</th>
<td>133.5059</td>
<td>135.1378</td>
<td>137.673</td>
<td>141.9694</td>
<td>146.832</td>
<td>151.7885</td>
<td>156.3303</td>
<td>159.0851</td>
<td>160.889</td>
</tr>
<tr>
<th scope="row">140.5</th>
<td>133.9199</td>
<td>135.5588</td>
<td>138.105</td>
<td>142.4209</td>
<td>147.3066</td>
<td>152.2878</td>
<td>156.8532</td>
<td>159.6228</td>
<td>161.4365</td>
</tr>
<tr>
<th scope="row">141.5</th>
<td>134.3423</td>
<td>135.9885</td>
<td>138.5461</td>
<td>142.882</td>
<td>147.7911</td>
<td>152.7969</td>
<td>157.3857</td>
<td>160.1697</td>
<td>161.993</td>
</tr>
<tr>
<th scope="row">142.5</th>
<td>134.7733</td>
<td>136.4271</td>
<td>138.9968</td>
<td>143.3532</td>
<td>148.2859</td>
<td>153.3164</td>
<td>157.928</td>
<td>160.7262</td>
<td>162.5588</td>
</tr>
<tr>
<th scope="row">143.5</th>
<td>135.2132</td>
<td>136.8751</td>
<td>139.4573</td>
<td>143.835</td>
<td>148.7917</td>
<td>153.8466</td>
<td>158.4807</td>
<td>161.2924</td>
<td>163.1339</td>
</tr>
<tr>
<th scope="row">144.5</th>
<td>135.6621</td>
<td>137.3326</td>
<td>139.928</td>
<td>144.3277</td>
<td>149.3088</td>
<td>154.3881</td>
<td>159.0439</td>
<td>161.8686</td>
<td>163.7185</td>
</tr>
<tr>
<th scope="row">145.5</th>
<td>136.1202</td>
<td>137.7998</td>
<td>140.4091</td>
<td>144.8317</td>
<td>149.8376</td>
<td>154.941</td>
<td>159.6179</td>
<td>162.4549</td>
<td>164.3126</td>
</tr>
<tr>
<th scope="row">146.5</th>
<td>136.5875</td>
<td>138.2769</td>
<td>140.9009</td>
<td>145.3473</td>
<td>150.3784</td>
<td>155.5056</td>
<td>160.2026</td>
<td>163.0511</td>
<td>164.916</td>
</tr>
<tr>
<th scope="row">147.5</th>
<td>137.064</td>
<td>138.7638</td>
<td>141.4034</td>
<td>145.8746</td>
<td>150.9313</td>
<td>156.0819</td>
<td>160.7981</td>
<td>163.6571</td>
<td>165.5285</td>
</tr>
<tr>
<th scope="row">148.5</th>
<td>137.5496</td>
<td>139.2605</td>
<td>141.9167</td>
<td>146.4137</td>
<td>151.4964</td>
<td>156.6699</td>
<td>161.4041</td>
<td>164.2726</td>
<td>166.1497</td>
</tr>
<tr>
<th scope="row">149.5</th>
<td>138.0442</td>
<td>139.767</td>
<td>142.4407</td>
<td>146.9645</td>
<td>152.0735</td>
<td>157.2694</td>
<td>162.0203</td>
<td>164.8972</td>
<td>166.7791</td>
</tr>
<tr>
<th scope="row">150.5</th>
<td>138.5477</td>
<td>140.2831</td>
<td>142.9752</td>
<td>147.5269</td>
<td>152.6624</td>
<td>157.88</td>
<td>162.6462</td>
<td>165.5302</td>
<td>167.416</td>
</tr>
<tr>
<th scope="row">151.5</th>
<td>139.0597</td>
<td>140.8085</td>
<td>143.52</td>
<td>148.1005</td>
<td>153.2627</td>
<td>158.5012</td>
<td>163.2811</td>
<td>166.1711</td>
<td>168.0596</td>
</tr>
<tr>
<th scope="row">152.5</th>
<td>139.5799</td>
<td>141.3429</td>
<td>144.0746</td>
<td>148.6849</td>
<td>153.8738</td>
<td>159.1324</td>
<td>163.9243</td>
<td>166.8187</td>
<td>168.7091</td>
</tr>
<tr>
<th scope="row">153.5</th>
<td>140.108</td>
<td>141.8859</td>
<td>144.6388</td>
<td>149.2795</td>
<td>154.4951</td>
<td>159.7725</td>
<td>164.5748</td>
<td>167.4723</td>
<td>169.3634</td>
</tr>
<tr>
<th scope="row">154.5</th>
<td>140.6435</td>
<td>142.4369</td>
<td>145.2117</td>
<td>149.8836</td>
<td>155.1255</td>
<td>160.4207</td>
<td>165.2314</td>
<td>168.1305</td>
<td>170.0213</td>
</tr>
<tr>
<th scope="row">155.5</th>
<td>141.1858</td>
<td>142.9955</td>
<td>145.7928</td>
<td>150.4962</td>
<td>155.7642</td>
<td>161.0758</td>
<td>165.893</td>
<td>168.7923</td>
<td>170.6817</td>
</tr>
<tr>
<th scope="row">156.5</th>
<td>141.7345</td>
<td>143.5608</td>
<td>146.3813</td>
<td>151.1165</td>
<td>156.4099</td>
<td>161.7364</td>
<td>166.5581</td>
<td>169.4561</td>
<td>171.343</td>
</tr>
<tr>
<th scope="row">157.5</th>
<td>142.2889</td>
<td>144.1322</td>
<td>146.9763</td>
<td>151.7433</td>
<td>157.0612</td>
<td>162.401</td>
<td>167.2253</td>
<td>170.1205</td>
<td>172.004</td>
</tr>
<tr>
<th scope="row">158.5</th>
<td>142.8482</td>
<td>144.7089</td>
<td>147.5767</td>
<td>152.3754</td>
<td>157.7168</td>
<td>163.0682</td>
<td>167.8929</td>
<td>170.784</td>
<td>172.663</td>
</tr>
<tr>
<th scope="row">159.5</th>
<td>143.4118</td>
<td>145.29</td>
<td>148.1815</td>
<td>153.0113</td>
<td>158.3751</td>
<td>163.7363</td>
<td>168.5594</td>
<td>171.445</td>
<td>173.3186</td>
</tr>
<tr>
<th scope="row">160.5</th>
<td>143.9788</td>
<td>145.8746</td>
<td>148.7896</td>
<td>153.6498</td>
<td>159.0344</td>
<td>164.4035</td>
<td>169.2231</td>
<td>172.1018</td>
<td>173.9691</td>
</tr>
<tr>
<th scope="row">161.5</th>
<td>144.5483</td>
<td>146.4615</td>
<td>149.3998</td>
<td>154.2892</td>
<td>159.6931</td>
<td>165.0681</td>
<td>169.8822</td>
<td>172.7528</td>
<td>174.6131</td>
</tr>
<tr>
<th scope="row">162.5</th>
<td>145.1196</td>
<td>147.0498</td>
<td>150.0107</td>
<td>154.928</td>
<td>160.3493</td>
<td>165.7283</td>
<td>170.535</td>
<td>173.3965</td>
<td>175.249</td>
</tr>
<tr>
<th scope="row">163.5</th>
<td>145.6915</td>
<td>147.6385</td>
<td>150.621</td>
<td>155.5647</td>
<td>161.0015</td>
<td>166.3823</td>
<td>171.1798</td>
<td>174.0312</td>
<td>175.8753</td>
</tr>
<tr>
<th scope="row">164.5</th>
<td>146.2633</td>
<td>148.2262</td>
<td>151.2295</td>
<td>156.1977</td>
<td>161.6478</td>
<td>167.0284</td>
<td>171.8151</td>
<td>174.6554</td>
<td>176.4906</td>
</tr>
<tr>
<th scope="row">165.5</th>
<td>146.8339</td>
<td>148.812</td>
<td>151.8348</td>
<td>156.8253</td>
<td>162.2865</td>
<td>167.665</td>
<td>172.4393</td>
<td>175.2677</td>
<td>177.0935</td>
</tr>
<tr>
<th scope="row">166.5</th>
<td>147.4023</td>
<td>149.3947</td>
<td>152.4355</td>
<td>157.4462</td>
<td>162.9161</td>
<td>168.2905</td>
<td>173.0509</td>
<td>175.8668</td>
<td>177.6829</td>
</tr>
<tr>
<th scope="row">167.5</th>
<td>147.9674</td>
<td>149.9731</td>
<td>153.0304</td>
<td>158.0587</td>
<td>163.535</td>
<td>168.9033</td>
<td>173.6486</td>
<td>176.4515</td>
<td>178.2575</td>
</tr>
<tr>
<th scope="row">168.5</th>
<td>148.5284</td>
<td>150.5461</td>
<td>153.6181</td>
<td>158.6615</td>
<td>164.1418</td>
<td>169.5022</td>
<td>174.2313</td>
<td>177.0206</td>
<td>178.8165</td>
</tr>
<tr>
<th scope="row">169.5</th>
<td>149.0842</td>
<td>151.1127</td>
<td>154.1975</td>
<td>159.2532</td>
<td>164.7352</td>
<td>170.0859</td>
<td>174.7978</td>
<td>177.5733</td>
<td>179.3589</td>
</tr>
<tr>
<th scope="row">170.5</th>
<td>149.6338</td>
<td>151.6717</td>
<td>154.7674</td>
<td>159.8327</td>
<td>165.314</td>
<td>170.6535</td>
<td>175.3473</td>
<td>178.1088</td>
<td>179.884</td>
</tr>
<tr>
<th scope="row">171.5</th>
<td>150.1763</td>
<td>152.2221</td>
<td>155.3268</td>
<td>160.3988</td>
<td>165.8771</td>
<td>171.2039</td>
<td>175.879</td>
<td>178.6264</td>
<td>180.3913</td>
</tr>
<tr>
<th scope="row">172.5</th>
<td>150.7107</td>
<td>152.763</td>
<td>155.8746</td>
<td>160.9506</td>
<td>166.4236</td>
<td>171.7364</td>
<td>176.3923</td>
<td>179.1256</td>
<td>180.8804</td>
</tr>
<tr>
<th scope="row">173.5</th>
<td>151.2363</td>
<td>153.2935</td>
<td>156.4099</td>
<td>161.4872</td>
<td>166.9528</td>
<td>172.2504</td>
<td>176.8868</td>
<td>179.6061</td>
<td>181.3509</td>
</tr>
<tr>
<th scope="row">174.5</th>
<td>151.7521</td>
<td>153.8127</td>
<td>156.9319</td>
<td>162.0078</td>
<td>167.4641</td>
<td>172.7455</td>
<td>177.3622</td>
<td>180.0676</td>
<td>181.8027</td>
</tr>
<tr>
<th scope="row">175.5</th>
<td>152.2575</td>
<td>154.32</td>
<td>157.4399</td>
<td>162.5118</td>
<td>167.9571</td>
<td>173.2213</td>
<td>177.8183</td>
<td>180.5102</td>
<td>182.2358</td>
</tr>
<tr>
<th scope="row">176.5</th>
<td>152.7517</td>
<td>154.8147</td>
<td>157.9334</td>
<td>162.9988</td>
<td>168.4313</td>
<td>173.6778</td>
<td>178.2551</td>
<td>180.9338</td>
<td>182.6503</td>
</tr>
<tr>
<th scope="row">177.5</th>
<td>153.2342</td>
<td>155.2961</td>
<td>158.4118</td>
<td>163.4685</td>
<td>168.8867</td>
<td>174.1148</td>
<td>178.6727</td>
<td>181.3385</td>
<td>183.0463</td>
</tr>
<tr>
<th scope="row">178.5</th>
<td>153.7043</td>
<td>155.7638</td>
<td>158.8747</td>
<td>163.9205</td>
<td>169.3231</td>
<td>174.5324</td>
<td>179.0712</td>
<td>181.7247</td>
<td>183.4242</td>
</tr>
<tr>
<th scope="row">179.5</th>
<td>154.1615</td>
<td>156.2174</td>
<td>159.3218</td>
<td>164.3547</td>
<td>169.7405</td>
<td>174.9309</td>
<td>179.451</td>
<td>182.0927</td>
<td>183.7842</td>
</tr>
<tr>
<th scope="row">180.5</th>
<td>154.6056</td>
<td>156.6566</td>
<td>159.7529</td>
<td>164.7713</td>
<td>170.1393</td>
<td>175.3105</td>
<td>179.8124</td>
<td>182.4429</td>
<td>184.127</td>
</tr>
<tr>
<th scope="row">181.5</th>
<td>155.036</td>
<td>157.0811</td>
<td>160.168</td>
<td>165.1701</td>
<td>170.5195</td>
<td>175.6716</td>
<td>180.1559</td>
<td>182.7757</td>
<td>184.4528</td>
</tr>
<tr>
<th scope="row">182.5</th>
<td>155.4526</td>
<td>157.4907</td>
<td>160.5669</td>
<td>165.5514</td>
<td>170.8815</td>
<td>176.0146</td>
<td>180.482</td>
<td>183.0918</td>
<td>184.7624</td>
</tr>
<tr>
<th scope="row">183.5</th>
<td>155.8552</td>
<td>157.8853</td>
<td>160.9498</td>
<td>165.9154</td>
<td>171.2257</td>
<td>176.34</td>
<td>180.7912</td>
<td>183.3916</td>
<td>185.0562</td>
</tr>
<tr>
<th scope="row">184.5</th>
<td>156.2436</td>
<td>158.265</td>
<td>161.3167</td>
<td>166.2625</td>
<td>171.5525</td>
<td>176.6483</td>
<td>181.0841</td>
<td>183.6757</td>
<td>185.3349</td>
</tr>
<tr>
<th scope="row">185.5</th>
<td>156.6178</td>
<td>158.6298</td>
<td>161.6679</td>
<td>166.5929</td>
<td>171.8626</td>
<td>176.9402</td>
<td>181.3614</td>
<td>183.9449</td>
<td>185.599</td>
</tr>
<tr>
<th scope="row">186.5</th>
<td>156.9777</td>
<td>158.9798</td>
<td>162.0035</td>
<td>166.9072</td>
<td>172.1563</td>
<td>177.2163</td>
<td>181.6236</td>
<td>184.1997</td>
<td>185.8493</td>
</tr>
<tr>
<th scope="row">187.5</th>
<td>157.3235</td>
<td>159.315</td>
<td>162.3239</td>
<td>167.2057</td>
<td>172.4343</td>
<td>177.4771</td>
<td>181.8715</td>
<td>184.4408</td>
<td>186.0863</td>
</tr>
<tr>
<th scope="row">188.5</th>
<td>157.6551</td>
<td>159.6359</td>
<td>162.6294</td>
<td>167.489</td>
<td>172.6972</td>
<td>177.7234</td>
<td>182.1056</td>
<td>184.6687</td>
<td>186.3107</td>
</tr>
<tr>
<th scope="row">189.5</th>
<td>157.9729</td>
<td>159.9425</td>
<td>162.9204</td>
<td>167.7576</td>
<td>172.9456</td>
<td>177.9558</td>
<td>182.3267</td>
<td>184.8843</td>
<td>186.5231</td>
</tr>
<tr>
<th scope="row">190.5</th>
<td>158.277</td>
<td>160.2352</td>
<td>163.1973</td>
<td>168.012</td>
<td>173.1801</td>
<td>178.175</td>
<td>182.5353</td>
<td>185.0879</td>
<td>186.724</td>
</tr>
<tr>
<th scope="row">191.5</th>
<td>158.5676</td>
<td>160.5143</td>
<td>163.4605</td>
<td>168.2528</td>
<td>173.4014</td>
<td>178.3815</td>
<td>182.7322</td>
<td>185.2804</td>
<td>186.9142</td>
</tr>
<tr>
<th scope="row">192.5</th>
<td>158.845</td>
<td>160.7802</td>
<td>163.7104</td>
<td>168.4805</td>
<td>173.6101</td>
<td>178.5762</td>
<td>182.9179</td>
<td>185.4623</td>
<td>187.0941</td>
</tr>
<tr>
<th scope="row">193.5</th>
<td>159.1095</td>
<td>161.0332</td>
<td>163.9476</td>
<td>168.6958</td>
<td>173.8067</td>
<td>178.7595</td>
<td>183.0931</td>
<td>185.6341</td>
<td>187.2643</td>
</tr>
<tr>
<th scope="row">194.5</th>
<td>159.3614</td>
<td>161.2738</td>
<td>164.1725</td>
<td>168.8991</td>
<td>173.992</td>
<td>178.9321</td>
<td>183.2583</td>
<td>185.7965</td>
<td>187.4254</td>
</tr>
<tr>
<th scope="row">195.5</th>
<td>159.6011</td>
<td>161.5023</td>
<td>164.3856</td>
<td>169.0911</td>
<td>174.1665</td>
<td>179.0946</td>
<td>183.414</td>
<td>185.9498</td>
<td>187.5779</td>
</tr>
<tr>
<th scope="row">196.5</th>
<td>159.829</td>
<td>161.7191</td>
<td>164.5873</td>
<td>169.2722</td>
<td>174.3308</td>
<td>179.2476</td>
<td>183.5609</td>
<td>186.0948</td>
<td>187.7222</td>
</tr>
<tr>
<th scope="row">197.5</th>
<td>160.0455</td>
<td>161.9247</td>
<td>164.7782</td>
<td>169.4431</td>
<td>174.4854</td>
<td>179.3915</td>
<td>183.6995</td>
<td>186.2318</td>
<td>187.8588</td>
</tr>
<tr>
<th scope="row">198.5</th>
<td>160.2508</td>
<td>162.1196</td>
<td>164.9587</td>
<td>169.6041</td>
<td>174.631</td>
<td>179.5271</td>
<td>183.8302</td>
<td>186.3613</td>
<td>187.9881</td>
</tr>
<tr>
<th scope="row">199.5</th>
<td>160.4456</td>
<td>162.3041</td>
<td>165.1292</td>
<td>169.756</td>
<td>174.768</td>
<td>179.6547</td>
<td>183.9535</td>
<td>186.4837</td>
<td>188.1106</td>
</tr>
<tr>
<th scope="row">200.5</th>
<td>160.63</td>
<td>162.4786</td>
<td>165.2903</td>
<td>169.8991</td>
<td>174.8969</td>
<td>179.7748</td>
<td>184.0699</td>
<td>186.5995</td>
<td>188.2267</td>
</tr>
<tr>
<th scope="row">201.5</th>
<td>160.8046</td>
<td>162.6437</td>
<td>165.4424</td>
<td>170.0339</td>
<td>175.0182</td>
<td>179.888</td>
<td>184.1797</td>
<td>186.7091</td>
<td>188.3368</td>
</tr>
<tr>
<th scope="row">202.5</th>
<td>160.9697</td>
<td>162.7997</td>
<td>165.586</td>
<td>170.1608</td>
<td>175.1323</td>
<td>179.9946</td>
<td>184.2835</td>
<td>186.8128</td>
<td>188.4411</td>
</tr>
<tr>
<th scope="row">203.5</th>
<td>161.1258</td>
<td>162.947</td>
<td>165.7214</td>
<td>170.2804</td>
<td>175.2398</td>
<td>180.095</td>
<td>184.3815</td>
<td>186.911</td>
<td>188.54</td>
</tr>
<tr>
<th scope="row">204.5</th>
<td>161.2733</td>
<td>163.086</td>
<td>165.8491</td>
<td>170.3931</td>
<td>175.341</td>
<td>180.1896</td>
<td>184.4741</td>
<td>187.004</td>
<td>188.6338</td>
</tr>
<tr>
<th scope="row">205.5</th>
<td>161.4125</td>
<td>163.2172</td>
<td>165.9694</td>
<td>170.4991</td>
<td>175.4362</td>
<td>180.2789</td>
<td>184.5617</td>
<td>187.0922</td>
<td>188.7229</td>
</tr>
<tr>
<th scope="row">206.5</th>
<td>161.5438</td>
<td>163.3409</td>
<td>166.0828</td>
<td>170.599</td>
<td>175.5259</td>
<td>180.3631</td>
<td>184.6446</td>
<td>187.1757</td>
<td>188.8075</td>
</tr>
<tr>
<th scope="row">207.5</th>
<td>161.6676</td>
<td>163.4575</td>
<td>166.1897</td>
<td>170.693</td>
<td>175.6104</td>
<td>180.4426</td>
<td>184.723</td>
<td>187.255</td>
<td>188.8878</td>
</tr>
<tr>
<th scope="row">208.5</th>
<td>161.7843</td>
<td>163.5673</td>
<td>166.2903</td>
<td>170.7816</td>
<td>175.6901</td>
<td>180.5176</td>
<td>184.7972</td>
<td>187.3302</td>
<td>188.9642</td>
</tr>
<tr>
<th scope="row">209.5</th>
<td>161.8942</td>
<td>163.6708</td>
<td>166.3851</td>
<td>170.865</td>
<td>175.7652</td>
<td>180.5885</td>
<td>184.8676</td>
<td>187.4016</td>
<td>189.0368</td>
</tr>
<tr>
<th scope="row">210.5</th>
<td>161.9977</td>
<td>163.7682</td>
<td>166.4743</td>
<td>170.9436</td>
<td>175.836</td>
<td>180.6555</td>
<td>184.9343</td>
<td>187.4694</td>
<td>189.1058</td>
</tr>
<tr>
<th scope="row">211.5</th>
<td>162.0951</td>
<td>163.8598</td>
<td>166.5583</td>
<td>171.0176</td>
<td>175.9028</td>
<td>180.7189</td>
<td>184.9975</td>
<td>187.5338</td>
<td>189.1715</td>
</tr>
<tr>
<th scope="row">212.5</th>
<td>162.1866</td>
<td>163.9461</td>
<td>166.6373</td>
<td>171.0873</td>
<td>175.9658</td>
<td>180.7789</td>
<td>185.0576</td>
<td>187.5951</td>
<td>189.234</td>
</tr>
<tr>
<th scope="row">213.5</th>
<td>162.2727</td>
<td>164.0272</td>
<td>166.7116</td>
<td>171.1529</td>
<td>176.0254</td>
<td>180.8357</td>
<td>185.1146</td>
<td>187.6534</td>
<td>189.2936</td>
</tr>
<tr>
<th scope="row">214.5</th>
<td>162.3537</td>
<td>164.1034</td>
<td>166.7816</td>
<td>171.2148</td>
<td>176.0816</td>
<td>180.8895</td>
<td>185.1687</td>
<td>187.7088</td>
<td>189.3503</td>
</tr>
<tr>
<th scope="row">215.5</th>
<td>162.4297</td>
<td>164.1751</td>
<td>166.8474</td>
<td>171.2732</td>
<td>176.1348</td>
<td>180.9405</td>
<td>185.2202</td>
<td>187.7617</td>
<td>189.4044</td>
</tr>
<tr>
<th scope="row">216.5</th>
<td>162.5011</td>
<td>164.2424</td>
<td>166.9094</td>
<td>171.3282</td>
<td>176.185</td>
<td>180.9889</td>
<td>185.2692</td>
<td>187.812</td>
<td>189.456</td>
</tr>
<tr>
<th scope="row">217.5</th>
<td>162.5681</td>
<td>164.3057</td>
<td>166.9676</td>
<td>171.3801</td>
<td>176.2326</td>
<td>181.0348</td>
<td>185.3159</td>
<td>187.86</td>
<td>189.5052</td>
</tr>
<tr>
<th scope="row">218.5</th>
<td>162.631</td>
<td>164.3651</td>
<td>167.0224</td>
<td>171.429</td>
<td>176.2776</td>
<td>181.0784</td>
<td>185.3603</td>
<td>187.9057</td>
<td>189.5522</td>
</tr>
<tr>
<th scope="row">219.5</th>
<td>162.69</td>
<td>164.4209</td>
<td>167.074</td>
<td>171.4752</td>
<td>176.3202</td>
<td>181.1199</td>
<td>185.4026</td>
<td>187.9494</td>
<td>189.5971</td>
</tr>
<tr>
<th scope="row">220.5</th>
<td>162.7453</td>
<td>164.4733</td>
<td>167.1224</td>
<td>171.5188</td>
<td>176.3606</td>
<td>181.1593</td>
<td>185.443</td>
<td>187.9911</td>
<td>189.6399</td>
</tr>
<tr>
<th scope="row">221.5</th>
<td>162.7972</td>
<td>164.5224</td>
<td>167.168</td>
<td>171.5599</td>
<td>176.3989</td>
<td>181.1968</td>
<td>185.4815</td>
<td>188.0309</td>
<td>189.6809</td>
</tr>
<tr>
<th scope="row">222.5</th>
<td>162.8458</td>
<td>164.5686</td>
<td>167.2109</td>
<td>171.5988</td>
<td>176.4352</td>
<td>181.2325</td>
<td>185.5182</td>
<td>188.069</td>
<td>189.7201</td>
</tr>
<tr>
<th scope="row">223.5</th>
<td>162.8914</td>
<td>164.6119</td>
<td>167.2513</td>
<td>171.6355</td>
<td>176.4697</td>
<td>181.2666</td>
<td>185.5534</td>
<td>188.1054</td>
<td>189.7575</td>
</tr>
<tr>
<th scope="row">224.5</th>
<td>162.9341</td>
<td>164.6526</td>
<td>167.2892</td>
<td>171.6701</td>
<td>176.5024</td>
<td>181.299</td>
<td>185.5869</td>
<td>188.1402</td>
<td>189.7934</td>
</tr>
<tr>
<th scope="row">225.5</th>
<td>162.9741</td>
<td>164.6907</td>
<td>167.325</td>
<td>171.7029</td>
<td>176.5335</td>
<td>181.33</td>
<td>185.619</td>
<td>188.1736</td>
<td>189.8277</td>
</tr>
<tr>
<th scope="row">226.5</th>
<td>163.0115</td>
<td>164.7265</td>
<td>167.3585</td>
<td>171.7339</td>
<td>176.563</td>
<td>181.3595</td>
<td>185.6497</td>
<td>188.2055</td>
<td>189.8606</td>
</tr>
<tr>
<th scope="row">227.5</th>
<td>163.0465</td>
<td>164.76</td>
<td>167.3902</td>
<td>171.7632</td>
<td>176.5911</td>
<td>181.3877</td>
<td>185.6791</td>
<td>188.236</td>
<td>189.8922</td>
</tr>
<tr>
<th scope="row">228.5</th>
<td>163.0793</td>
<td>164.7915</td>
<td>167.4199</td>
<td>171.791</td>
<td>176.6179</td>
<td>181.4147</td>
<td>185.7073</td>
<td>188.2653</td>
<td>189.9224</td>
</tr>
<tr>
<th scope="row">229.5</th>
<td>163.11</td>
<td>164.821</td>
<td>167.4479</td>
<td>171.8172</td>
<td>176.6433</td>
<td>181.4405</td>
<td>185.7343</td>
<td>188.2934</td>
<td>189.9513</td>
</tr>
<tr>
<th scope="row">230.5</th>
<td>163.1387</td>
<td>164.8487</td>
<td>167.4742</td>
<td>171.8421</td>
<td>176.6676</td>
<td>181.4651</td>
<td>185.7601</td>
<td>188.3204</td>
<td>189.9791</td>
</tr>
<tr>
<th scope="row">231.5</th>
<td>163.1656</td>
<td>164.8746</td>
<td>167.499</td>
<td>171.8657</td>
<td>176.6907</td>
<td>181.4887</td>
<td>185.7849</td>
<td>188.3462</td>
<td>190.0058</td>
</tr>
<tr>
<th scope="row">232.5</th>
<td>163.1907</td>
<td>164.8989</td>
<td>167.5224</td>
<td>171.888</td>
<td>176.7127</td>
<td>181.5113</td>
<td>185.8087</td>
<td>188.3711</td>
<td>190.0314</td>
</tr>
<tr>
<th scope="row">233.5</th>
<td>163.2142</td>
<td>164.9217</td>
<td>167.5444</td>
<td>171.9091</td>
<td>176.7337</td>
<td>181.533</td>
<td>185.8316</td>
<td>188.3949</td>
<td>190.056</td>
</tr>
<tr>
<th scope="row">234.5</th>
<td>163.2361</td>
<td>164.9431</td>
<td>167.5651</td>
<td>171.9292</td>
<td>176.7538</td>
<td>181.5538</td>
<td>185.8535</td>
<td>188.4178</td>
<td>190.0797</td>
</tr>
<tr>
<th scope="row">235.5</th>
<td>163.2566</td>
<td>164.9631</td>
<td>167.5846</td>
<td>171.9483</td>
<td>176.773</td>
<td>181.5737</td>
<td>185.8746</td>
<td>188.4399</td>
<td>190.1024</td>
</tr>
<tr>
<th scope="row">236.5</th>
<td>163.2757</td>
<td>164.9819</td>
<td>167.6029</td>
<td>171.9663</td>
<td>176.7913</td>
<td>181.5928</td>
<td>185.8949</td>
<td>188.461</td>
<td>190.1242</td>
</tr>
<tr>
<th scope="row">237.5</th>
<td>163.2936</td>
<td>164.9995</td>
<td>167.6203</td>
<td>171.9835</td>
<td>176.8088</td>
<td>181.6111</td>
<td>185.9144</td>
<td>188.4814</td>
<td>190.1452</td>
</tr>
<tr>
<th scope="row">238.5</th>
<td>163.3103</td>
<td>165.016</td>
<td>167.6366</td>
<td>171.9998</td>
<td>176.8255</td>
<td>181.6287</td>
<td>185.9331</td>
<td>188.501</td>
<td>190.1654</td>
</tr>
<tr>
<th scope="row">239.5</th>
<td>163.3259</td>
<td>165.0315</td>
<td>167.6519</td>
<td>172.0153</td>
<td>176.8415</td>
<td>181.6456</td>
<td>185.9512</td>
<td>188.5198</td>
<td>190.1849</td>
</tr>
<tr>
<th scope="row">240</th>
<td>163.3333</td>
<td>165.0389</td>
<td>167.6593</td>
<td>172.0227</td>
<td>176.8492</td>
<td>181.6538</td>
<td>185.9599</td>
<td>188.529</td>
<td>190.1943</td>
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

