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
<td>45.09488</td>
<td>45.57561</td>
<td>46.33934</td>
<td>47.68345</td>
<td>49.2864</td>
<td>51.0187</td>
<td>52.7025</td>
<td>53.77291</td>
<td>54.49527</td>
</tr>
<tr>
<th scope="row">0.5</th>
<td>47.46916</td>
<td>47.96324</td>
<td>48.74248</td>
<td>50.09686</td>
<td>51.68358</td>
<td>53.36362</td>
<td>54.96222</td>
<td>55.96094</td>
<td>56.62728</td>
</tr>
<tr>
<th scope="row">1.5</th>
<td>50.95701</td>
<td>51.47996</td>
<td>52.29627</td>
<td>53.69078</td>
<td>55.28613</td>
<td>56.93136</td>
<td>58.45612</td>
<td>59.38911</td>
<td>60.00338</td>
</tr>
<tr>
<th scope="row">2.5</th>
<td>53.62925</td>
<td>54.17907</td>
<td>55.03144</td>
<td>56.47125</td>
<td>58.09382</td>
<td>59.74045</td>
<td>61.24306</td>
<td>62.15166</td>
<td>62.74547</td>
</tr>
<tr>
<th scope="row">3.5</th>
<td>55.8594</td>
<td>56.43335</td>
<td>57.31892</td>
<td>58.80346</td>
<td>60.45981</td>
<td>62.1233</td>
<td>63.62648</td>
<td>64.52875</td>
<td>65.11577</td>
</tr>
<tr>
<th scope="row">4.5</th>
<td>57.8047</td>
<td>58.40032</td>
<td>59.31633</td>
<td>60.84386</td>
<td>62.5367</td>
<td>64.22507</td>
<td>65.74096</td>
<td>66.64653</td>
<td>67.23398</td>
</tr>
<tr>
<th scope="row">5.5</th>
<td>59.54799</td>
<td>60.16323</td>
<td>61.10726</td>
<td>62.6759</td>
<td>64.40633</td>
<td>66.12418</td>
<td>67.65995</td>
<td>68.57452</td>
<td>69.16668</td>
</tr>
<tr>
<th scope="row">6.5</th>
<td>61.13893</td>
<td>61.77208</td>
<td>62.7421</td>
<td>64.35005</td>
<td>66.11842</td>
<td>67.8685</td>
<td>69.42868</td>
<td>70.35587</td>
<td>70.95545</td>
</tr>
<tr>
<th scope="row">7.5</th>
<td>62.60993</td>
<td>63.25958</td>
<td>64.25389</td>
<td>65.89952</td>
<td>67.70574</td>
<td>69.48975</td>
<td>71.07731</td>
<td>72.01952</td>
<td>72.62835</td>
</tr>
<tr>
<th scope="row">8.5</th>
<td>63.98348</td>
<td>64.64845</td>
<td>65.66559</td>
<td>67.34745</td>
<td>69.19124</td>
<td>71.01019</td>
<td>72.62711</td>
<td>73.58601</td>
<td>74.20532</td>
</tr>
<tr>
<th scope="row">9.5</th>
<td>65.2759</td>
<td>65.9552</td>
<td>66.99394</td>
<td>68.7107</td>
<td>70.59164</td>
<td>72.44614</td>
<td>74.09378</td>
<td>75.0705</td>
<td>75.70118</td>
</tr>
<tr>
<th scope="row">10.5</th>
<td>66.49948</td>
<td>67.19226</td>
<td>68.25154</td>
<td>70.00202</td>
<td>71.91962</td>
<td>73.80997</td>
<td>75.48923</td>
<td>76.4846</td>
<td>77.12729</td>
</tr>
<tr>
<th scope="row">11.5</th>
<td>67.66371</td>
<td>68.36925</td>
<td>69.44814</td>
<td>71.23128</td>
<td>73.18501</td>
<td>75.11133</td>
<td>76.82282</td>
<td>77.83742</td>
<td>78.49257</td>
</tr>
<tr>
<th scope="row">12.5</th>
<td>68.77613</td>
<td>69.4938</td>
<td>70.59149</td>
<td>72.40633</td>
<td>74.39564</td>
<td>76.35791</td>
<td>78.10202</td>
<td>79.13625</td>
<td>79.80419</td>
</tr>
<tr>
<th scope="row">13.5</th>
<td>69.8428</td>
<td>70.57207</td>
<td>71.68784</td>
<td>73.53349</td>
<td>75.55785</td>
<td>77.55594</td>
<td>79.3329</td>
<td>80.38705</td>
<td>81.06801</td>
</tr>
<tr>
<th scope="row">14.5</th>
<td>70.86874</td>
<td>71.60911</td>
<td>72.74233</td>
<td>74.61799</td>
<td>76.67686</td>
<td>78.71058</td>
<td>80.5205</td>
<td>81.59475</td>
<td>82.28891</td>
</tr>
<tr>
<th scope="row">15.5</th>
<td>71.85807</td>
<td>72.60914</td>
<td>73.75924</td>
<td>75.66416</td>
<td>77.75701</td>
<td>79.82613</td>
<td>81.66903</td>
<td>82.7635</td>
<td>83.47098</td>
</tr>
<tr>
<th scope="row">16.5</th>
<td>72.81433</td>
<td>73.57571</td>
<td>74.74217</td>
<td>76.67568</td>
<td>78.80198</td>
<td>80.90623</td>
<td>82.78208</td>
<td>83.89683</td>
<td>84.6177</td>
</tr>
<tr>
<th scope="row">17.5</th>
<td>73.74047</td>
<td>74.51184</td>
<td>75.6942</td>
<td>77.65565</td>
<td>79.81492</td>
<td>81.95399</td>
<td>83.86269</td>
<td>84.99774</td>
<td>85.73205</td>
</tr>
<tr>
<th scope="row">18.5</th>
<td>74.63908</td>
<td>75.42012</td>
<td>76.61797</td>
<td>78.60678</td>
<td>80.79852</td>
<td>82.97211</td>
<td>84.91353</td>
<td>86.06887</td>
<td>86.81663</td>
</tr>
<tr>
<th scope="row">19.5</th>
<td>75.51237</td>
<td>76.30282</td>
<td>77.51576</td>
<td>79.53138</td>
<td>81.75512</td>
<td>83.96292</td>
<td>85.93689</td>
<td>87.11249</td>
<td>87.8737</td>
</tr>
<tr>
<th scope="row">20.5</th>
<td>76.36229</td>
<td>77.16191</td>
<td>78.38958</td>
<td>80.4315</td>
<td>82.68679</td>
<td>84.92846</td>
<td>86.93481</td>
<td>88.13061</td>
<td>88.90526</td>
</tr>
<tr>
<th scope="row">21.5</th>
<td>77.19056</td>
<td>77.9991</td>
<td>79.2412</td>
<td>81.30893</td>
<td>83.59532</td>
<td>85.87054</td>
<td>87.90908</td>
<td>89.125</td>
<td>89.91305</td>
</tr>
<tr>
<th scope="row">22.5</th>
<td>77.99868</td>
<td>78.81595</td>
<td>80.07216</td>
<td>82.16525</td>
<td>84.48233</td>
<td>86.79077</td>
<td>88.86127</td>
<td>90.09723</td>
<td>90.89866</td>
</tr>
<tr>
<th scope="row">23.5</th>
<td>78.78801</td>
<td>79.61381</td>
<td>80.88385</td>
<td>83.00187</td>
<td>85.34924</td>
<td>87.69056</td>
<td>89.79282</td>
<td>91.04873</td>
<td>91.86347</td>
</tr>
<tr>
<th scope="row">24.5</th>
<td>79.55974</td>
<td>80.39391</td>
<td>81.67752</td>
<td>83.82007</td>
<td>86.19732</td>
<td>88.57121</td>
<td>90.70499</td>
<td>91.98074</td>
<td>92.80876</td>
</tr>
<tr>
<th scope="row">25.5</th>
<td>80.33998</td>
<td>81.18804</td>
<td>82.49318</td>
<td>84.67209</td>
<td>87.09026</td>
<td>89.50562</td>
<td>91.67718</td>
<td>92.97574</td>
<td>93.81864</td>
</tr>
<tr>
<th scope="row">26.5</th>
<td>81.11332</td>
<td>81.97223</td>
<td>83.29459</td>
<td>85.5036</td>
<td>87.95714</td>
<td>90.40982</td>
<td>92.61658</td>
<td>93.93693</td>
<td>94.79426</td>
</tr>
<tr>
<th scope="row">27.5</th>
<td>81.87334</td>
<td>82.74084</td>
<td>84.07717</td>
<td>86.31151</td>
<td>88.79602</td>
<td>91.28258</td>
<td>93.52227</td>
<td>94.86339</td>
<td>95.73464</td>
</tr>
<tr>
<th scope="row">28.5</th>
<td>82.61506</td>
<td>83.48951</td>
<td>84.83741</td>
<td>87.09346</td>
<td>89.60551</td>
<td>92.12313</td>
<td>94.39371</td>
<td>95.75464</td>
<td>96.63928</td>
</tr>
<tr>
<th scope="row">29.5</th>
<td>83.33473</td>
<td>84.21496</td>
<td>85.57273</td>
<td>87.84783</td>
<td>90.38477</td>
<td>92.93113</td>
<td>95.23082</td>
<td>96.61061</td>
<td>97.50808</td>
</tr>
<tr>
<th scope="row">30.5</th>
<td>84.02972</td>
<td>84.91494</td>
<td>86.28139</td>
<td>88.57362</td>
<td>91.13342</td>
<td>93.70662</td>
<td>96.03385</td>
<td>97.43164</td>
<td>98.34139</td>
</tr>
<tr>
<th scope="row">31.5</th>
<td>84.69837</td>
<td>85.58809</td>
<td>86.96242</td>
<td>89.27042</td>
<td>91.85154</td>
<td>94.45005</td>
<td>96.80343</td>
<td>98.2184</td>
<td>99.13993</td>
</tr>
<tr>
<th scope="row">32.5</th>
<td>85.33987</td>
<td>86.23379</td>
<td>87.6155</td>
<td>89.93835</td>
<td>92.53964</td>
<td>95.16218</td>
<td>97.54052</td>
<td>98.97193</td>
<td>99.90473</td>
</tr>
<tr>
<th scope="row">33.5</th>
<td>85.95413</td>
<td>86.85208</td>
<td>88.24089</td>
<td>90.57795</td>
<td>93.19854</td>
<td>95.84411</td>
<td>98.24636</td>
<td>99.69353</td>
<td>100.6372</td>
</tr>
<tr>
<th scope="row">34.5</th>
<td>86.54167</td>
<td>87.44359</td>
<td>88.83932</td>
<td>91.1902</td>
<td>93.82945</td>
<td>96.49721</td>
<td>98.92246</td>
<td>100.3848</td>
<td>101.3388</td>
</tr>
<tr>
<th scope="row">35.5</th>
<td>86.73453</td>
<td>87.63658</td>
<td>89.03323</td>
<td>91.38765</td>
<td>94.03382</td>
<td>96.71168</td>
<td>99.14880</td>
<td>100.6195</td>
<td>101,5795</td>
</tr>
<tr>
<th scope="row">36.5</th>
<td>86.90307</td>
<td>87.80528</td>
<td>89.20285</td>
<td>91.56066</td>
<td>94.21336</td>
<td>96.90071</td>
<td>99.34899</td>
<td>100.8276</td>
<td>101.7931</td>
</tr>
<tr>
<th scope="row">37.5</th>
<td>87.43482</td>
<td>88.34236</td>
<td>89.74875</td>
<td>92.12298</td>
<td>94.79643</td>
<td>97.50724</td>
<td>99.97896</td>
<td>101.4726</td>
<td>102.4485</td>
</tr>
<tr>
<th scope="row">38.5</th>
<td>87.95945</td>
<td>88.87256</td>
<td>90.28811</td>
<td>92.67925</td>
<td>95.37392</td>
<td>98.10855</td>
<td>100.604</td>
<td>102.1129</td>
<td>103.0991</td>
</tr>
<tr>
<th scope="row">39.5</th>
<td>88.4785</td>
<td>89.39733</td>
<td>90.82228</td>
<td>93.2307</td>
<td>95.94693</td>
<td>98.70568</td>
<td>101.2251</td>
<td>102.7494</td>
<td>103.746</td>
</tr>
<tr>
<th scope="row">40.5</th>
<td>88.9933</td>
<td>89.91797</td>
<td>91.35246</td>
<td>93.7784</td>
<td>96.51645</td>
<td>99.29957</td>
<td>101.8432</td>
<td>103.383</td>
<td>104.3901</td>
</tr>
<tr>
<th scope="row">41.5</th>
<td>89.50502</td>
<td>90.43559</td>
<td>91.87972</td>
<td>94.32334</td>
<td>97.08337</td>
<td>99.89104</td>
<td>102.459</td>
<td>104.0144</td>
<td>105.032</td>
</tr>
<tr>
<th scope="row">42.5</th>
<td>90.01466</td>
<td>90.95115</td>
<td>92.40497</td>
<td>94.86634</td>
<td>97.64848</td>
<td>100.4808</td>
<td>103.0732</td>
<td>104.6444</td>
<td>105.6727</td>
</tr>
<tr>
<th scope="row">43.5</th>
<td>90.52307</td>
<td>91.46549</td>
<td>92.92901</td>
<td>95.40817</td>
<td>98.21247</td>
<td>101.0696</td>
<td>103.6866</td>
<td>105.2736</td>
<td>106.3126</td>
</tr>
<tr>
<th scope="row">44.5</th>
<td>91.031</td>
<td>91.97932</td>
<td>93.45252</td>
<td>95.94946</td>
<td>98.77593</td>
<td>101.6579</td>
<td>104.2996</td>
<td>105.9025</td>
<td>106.9523</td>
</tr>
<tr>
<th scope="row">45.5</th>
<td>91.53905</td>
<td>92.49325</td>
<td>93.97609</td>
<td>96.49076</td>
<td>99.3394</td>
<td>102.2462</td>
<td>104.9128</td>
<td>106.5316</td>
<td>107.5922</td>
</tr>
<tr>
<th scope="row">46.5</th>
<td>92.04774</td>
<td>93.00778</td>
<td>94.50021</td>
<td>97.03254</td>
<td>99.90331</td>
<td>102.835</td>
<td>105.5264</td>
<td>107.1613</td>
<td>108.2328</td>
</tr>
<tr>
<th scope="row">47.5</th>
<td>92.55748</td>
<td>93.52333</td>
<td>95.02528</td>
<td>97.57519</td>
<td>100.4681</td>
<td>103.4247</td>
<td>106.141</td>
<td>107.7919</td>
<td>108.8744</td>
</tr>
<tr>
<th scope="row">48.5</th>
<td>93.06862</td>
<td>94.04022</td>
<td>95.55164</td>
<td>98.11905</td>
<td>101.0339</td>
<td>104.0154</td>
<td>106.7567</td>
<td>108.4238</td>
<td>109.5172</td>
</tr>
<tr>
<th scope="row">49.5</th>
<td>93.58141</td>
<td>94.55872</td>
<td>96.07954</td>
<td>98.66436</td>
<td>101.6012</td>
<td>104.6075</td>
<td>107.3737</td>
<td>109.057</td>
<td>110.1614</td>
</tr>
<tr>
<th scope="row">50.5</th>
<td>94.09605</td>
<td>95.07903</td>
<td>96.60918</td>
<td>99.21132</td>
<td>102.17</td>
<td>105.2012</td>
<td>107.9924</td>
<td>109.6918</td>
<td>110.8073</td>
</tr>
<tr>
<th scope="row">51.5</th>
<td>94.61267</td>
<td>95.60128</td>
<td>97.14072</td>
<td>99.76009</td>
<td>102.7406</td>
<td>105.7965</td>
<td>108.6127</td>
<td>110.3283</td>
<td>111.4548</td>
</tr>
<tr>
<th scope="row">52.5</th>
<td>95.13134</td>
<td>96.12555</td>
<td>97.67423</td>
<td>100.3108</td>
<td>103.313</td>
<td>106.3936</td>
<td>109.2347</td>
<td>110.9665</td>
<td>112.1041</td>
</tr>
<tr>
<th scope="row">53.5</th>
<td>95.65211</td>
<td>96.65189</td>
<td>98.20976</td>
<td>100.8634</td>
<td>103.8873</td>
<td>106.9925</td>
<td>109.8585</td>
<td>111.6066</td>
<td>112.7552</td>
</tr>
<tr>
<th scope="row">54.5</th>
<td>96.17495</td>
<td>97.18029</td>
<td>98.74731</td>
<td>101.418</td>
<td>104.4635</td>
<td>107.5933</td>
<td>110.4841</td>
<td>112.2483</td>
<td>113.4079</td>
</tr>
<tr>
<th scope="row">55.5</th>
<td>96.69982</td>
<td>97.71069</td>
<td>99.28686</td>
<td>101.9745</td>
<td>105.0415</td>
<td>108.1958</td>
<td>111.1114</td>
<td>112.8917</td>
<td>114.0624</td>
</tr>
<tr>
<th scope="row">56.5</th>
<td>97.22663</td>
<td>98.24303</td>
<td>99.82832</td>
<td>102.5329</td>
<td>105.6213</td>
<td>108.8001</td>
<td>111.7404</td>
<td>113.5368</td>
<td>114.7184</td>
</tr>
<tr>
<th scope="row">57.5</th>
<td>97.75525</td>
<td>98.77719</td>
<td>100.3716</td>
<td>103.093</td>
<td>106.2029</td>
<td>109.406</td>
<td>112.3709</td>
<td>114.1833</td>
<td>115.3759</td>
</tr>
<tr>
<th scope="row">58.5</th>
<td>98.28555</td>
<td>99.31303</td>
<td>100.9165</td>
<td>103.6549</td>
<td>106.7861</td>
<td>110.0134</td>
<td>113.0028</td>
<td>114.8312</td>
<td>116.0347</td>
</tr>
<tr>
<th scope="row">59.5</th>
<td>98.81735</td>
<td>99.85039</td>
<td>101.463</td>
<td>104.2182</td>
<td>107.3707</td>
<td>110.6222</td>
<td>113.6359</td>
<td>115.4802</td>
<td>116.6945</td>
</tr>
<tr>
<th scope="row">60.5</th>
<td>99.35047</td>
<td>100.3891</td>
<td>102.0109</td>
<td>104.7829</td>
<td>107.9566</td>
<td>111.2321</td>
<td>114.2701</td>
<td>116.1301</td>
<td>117.3552</td>
</tr>
<tr>
<th scope="row">61.5</th>
<td>99.8847</td>
<td>100.9289</td>
<td>102.5599</td>
<td>105.3488</td>
<td>108.5436</td>
<td>111.8431</td>
<td>114.9052</td>
<td>116.7808</td>
<td>118.0166</td>
</tr>
<tr>
<th scope="row">62.5</th>
<td>100.4198</td>
<td>101.4696</td>
<td>103.1098</td>
<td>105.9156</td>
<td>109.1316</td>
<td>112.4548</td>
<td>115.5408</td>
<td>117.432</td>
<td>118.6783</td>
</tr>
<tr>
<th scope="row">63.5</th>
<td>100.9555</td>
<td>102.011</td>
<td>103.6604</td>
<td>106.4831</td>
<td>109.7202</td>
<td>113.0671</td>
<td>116.1768</td>
<td>118.0834</td>
<td>119.3402</td>
</tr>
<tr>
<th scope="row">64.5</th>
<td>101.4916</td>
<td>102.5529</td>
<td>104.2115</td>
<td>107.0512</td>
<td>110.3092</td>
<td>113.6797</td>
<td>116.813</td>
<td>118.7348</td>
<td>120.0019</td>
</tr>
<tr>
<th scope="row">65.5</th>
<td>102.0279</td>
<td>103.0948</td>
<td>104.7628</td>
<td>107.6194</td>
<td>110.8984</td>
<td>114.2923</td>
<td>117.449</td>
<td>119.3858</td>
<td>120.6632</td>
</tr>
<tr>
<th scope="row">66.5</th>
<td>102.564</td>
<td>103.6367</td>
<td>105.3141</td>
<td>108.1877</td>
<td>111.4876</td>
<td>114.9048</td>
<td>118.0845</td>
<td>120.0362</td>
<td>121.3238</td>
</tr>
<tr>
<th scope="row">67.5</th>
<td>103.0996</td>
<td>104.1782</td>
<td>105.865</td>
<td>108.7556</td>
<td>112.0764</td>
<td>115.5167</td>
<td>118.7193</td>
<td>120.6857</td>
<td>121.9832</td>
</tr>
<tr>
<th scope="row">68.5</th>
<td>103.6346</td>
<td>104.7191</td>
<td>106.4154</td>
<td>109.323</td>
<td>112.6646</td>
<td>116.1278</td>
<td>119.3531</td>
<td>121.334</td>
<td>122.6413</td>
</tr>
<tr>
<th scope="row">69.5</th>
<td>104.1685</td>
<td>105.259</td>
<td>106.9648</td>
<td>109.8895</td>
<td>113.2519</td>
<td>116.7379</td>
<td>119.9855</td>
<td>121.9807</td>
<td>123.2977</td>
</tr>
<tr>
<th scope="row">70.5</th>
<td>104.7012</td>
<td>105.7976</td>
<td>107.5131</td>
<td>110.4549</td>
<td>113.838</td>
<td>117.3466</td>
<td>120.6163</td>
<td>122.6256</td>
<td>123.9521</td>
</tr>
<tr>
<th scope="row">71.5</th>
<td>105.2323</td>
<td>106.3348</td>
<td>108.0599</td>
<td>111.0189</td>
<td>114.4226</td>
<td>117.9537</td>
<td>121.2452</td>
<td>123.2684</td>
<td>124.6042</td>
</tr>
<tr>
<th scope="row">72.5</th>
<td>105.7615</td>
<td>106.8701</td>
<td>108.605</td>
<td>111.5812</td>
<td>115.0055</td>
<td>118.5588</td>
<td>121.8718</td>
<td>123.9086</td>
<td>125.2536</td>
</tr>
<tr>
<th scope="row">73.5</th>
<td>106.2886</td>
<td>107.4033</td>
<td>109.148</td>
<td>112.1415</td>
<td>115.5863</td>
<td>119.1616</td>
<td>122.4959</td>
<td>124.5461</td>
<td>125.9</td>
</tr>
<tr>
<th scope="row">74.5</th>
<td>106.8132</td>
<td>107.9342</td>
<td>109.6888</td>
<td>112.6996</td>
<td>116.1648</td>
<td>119.7619</td>
<td>123.1171</td>
<td>125.1804</td>
<td>126.5432</td>
</tr>
<tr>
<th scope="row">75.5</th>
<td>107.3351</td>
<td>108.4624</td>
<td>110.227</td>
<td>113.255</td>
<td>116.7406</td>
<td>120.3594</td>
<td>123.7352</td>
<td>125.8114</td>
<td>127.1827</td>
</tr>
<tr>
<th scope="row">76.5</th>
<td>107.8541</td>
<td>108.9877</td>
<td>110.7623</td>
<td>113.8077</td>
<td>117.3136</td>
<td>120.9537</td>
<td>124.3499</td>
<td>126.4387</td>
<td>127.8184</td>
</tr>
<tr>
<th scope="row">77.5</th>
<td>108.3698</td>
<td>109.5099</td>
<td>111.2944</td>
<td>114.3572</td>
<td>117.8833</td>
<td>121.5447</td>
<td>124.9608</td>
<td>127.062</td>
<td>128.45</td>
</tr>
<tr>
<th scope="row">78.5</th>
<td>108.882</td>
<td>110.0285</td>
<td>111.8232</td>
<td>114.9034</td>
<td>118.4496</td>
<td>122.132</td>
<td>125.5678</td>
<td>127.6811</td>
<td>129.0771</td>
</tr>
<tr>
<th scope="row">79.5</th>
<td>109.3905</td>
<td>110.5435</td>
<td>112.3483</td>
<td>115.446</td>
<td>119.0123</td>
<td>122.7154</td>
<td>126.1705</td>
<td>128.2957</td>
<td>129.6996</td>
</tr>
<tr>
<th scope="row">80.5</th>
<td>109.8949</td>
<td>111.0545</td>
<td>112.8696</td>
<td>115.9847</td>
<td>119.571</td>
<td>123.2946</td>
<td>126.7688</td>
<td>128.9056</td>
<td>130.3171</td>
</tr>
<tr>
<th scope="row">81.5</th>
<td>110.3952</td>
<td>111.5613</td>
<td>113.3867</td>
<td>116.5193</td>
<td>120.1254</td>
<td>123.8695</td>
<td>127.3623</td>
<td>129.5105</td>
<td>130.9295</td>
</tr>
<tr>
<th scope="row">82.5</th>
<td>110.8909</td>
<td>112.0638</td>
<td>113.8995</td>
<td>117.0496</td>
<td>120.6755</td>
<td>124.4397</td>
<td>127.951</td>
<td>130.1103</td>
<td>131.5365</td>
</tr>
<tr>
<th scope="row">83.5</th>
<td>111.3821</td>
<td>112.5616</td>
<td>114.4077</td>
<td>117.5754</td>
<td>121.221</td>
<td>125.0051</td>
<td>128.5345</td>
<td>130.7047</td>
<td>132.138</td>
</tr>
<tr>
<th scope="row">84.5</th>
<td>111.8684</td>
<td>113.0546</td>
<td>114.9112</td>
<td>118.0964</td>
<td>121.7617</td>
<td>125.5655</td>
<td>129.1127</td>
<td>131.2936</td>
<td>132.7338</td>
</tr>
<tr>
<th scope="row">85.5</th>
<td>112.3496</td>
<td>113.5427</td>
<td>115.4097</td>
<td>118.6125</td>
<td>122.2974</td>
<td>126.1207</td>
<td>129.6855</td>
<td>131.8768</td>
<td>133.3238</td>
</tr>
<tr>
<th scope="row">86.5</th>
<td>112.8257</td>
<td>114.0256</td>
<td>115.9031</td>
<td>119.1235</td>
<td>122.8279</td>
<td>126.6706</td>
<td>130.2526</td>
<td>132.4542</td>
<td>133.9077</td>
</tr>
<tr>
<th scope="row">87.5</th>
<td>113.2963</td>
<td>114.5031</td>
<td>116.3913</td>
<td>119.6293</td>
<td>123.3531</td>
<td>127.215</td>
<td>130.814</td>
<td>133.0256</td>
<td>134.4857</td>
</tr>
<tr>
<th scope="row">88.5</th>
<td>113.7615</td>
<td>114.9752</td>
<td>116.874</td>
<td>120.1297</td>
<td>123.8728</td>
<td>127.7539</td>
<td>131.3696</td>
<td>133.5911</td>
<td>135.0574</td>
</tr>
<tr>
<th scope="row">89.5</th>
<td>114.2211</td>
<td>115.4418</td>
<td>117.3512</td>
<td>120.6246</td>
<td>124.387</td>
<td>128.287</td>
<td>131.9194</td>
<td>134.1505</td>
<td>135.623</td>
</tr>
<tr>
<th scope="row">90.5</th>
<td>114.6749</td>
<td>115.9026</td>
<td>117.8228</td>
<td>121.1138</td>
<td>124.8956</td>
<td>128.8144</td>
<td>132.4631</td>
<td>134.7038</td>
<td>136.1824</td>
</tr>
<tr>
<th scope="row">91.5</th>
<td>115.123</td>
<td>116.3577</td>
<td>118.2886</td>
<td>121.5974</td>
<td>125.3985</td>
<td>129.3359</td>
<td>133.0009</td>
<td>135.251</td>
<td>136.7356</td>
</tr>
<tr>
<th scope="row">92.5</th>
<td>115.5651</td>
<td>116.8069</td>
<td>118.7486</td>
<td>122.0753</td>
<td>125.8956</td>
<td>129.8516</td>
<td>133.5328</td>
<td>135.7922</td>
<td>137.2826</td>
</tr>
<tr>
<th scope="row">93.5</th>
<td>116.0012</td>
<td>117.2502</td>
<td>119.2028</td>
<td>122.5473</td>
<td>126.3869</td>
<td>130.3615</td>
<td>134.0587</td>
<td>136.3273</td>
<td>137.8236</td>
</tr>
<tr>
<th scope="row">94.5</th>
<td>116.4314</td>
<td>117.6875</td>
<td>119.6511</td>
<td>123.0135</td>
<td>126.8724</td>
<td>130.8656</td>
<td>134.5787</td>
<td>136.8565</td>
<td>138.3585</td>
</tr>
<tr>
<th scope="row">95.5</th>
<td>116.8555</td>
<td>118.1189</td>
<td>120.0935</td>
<td>123.4739</td>
<td>127.3522</td>
<td>131.364</td>
<td>135.093</td>
<td>137.3798</td>
<td>138.8876</td>
</tr>
<tr>
<th scope="row">96.5</th>
<td>117.2737</td>
<td>118.5443</td>
<td>120.53</td>
<td>123.9285</td>
<td>127.8263</td>
<td>131.8567</td>
<td>135.6015</td>
<td>137.8975</td>
<td>139.411</td>
</tr>
<tr>
<th scope="row">97.5</th>
<td>117.6858</td>
<td>118.9638</td>
<td>120.9607</td>
<td>124.3774</td>
<td>128.2947</td>
<td>132.3438</td>
<td>136.1046</td>
<td>138.4097</td>
<td>139.9289</td>
</tr>
<tr>
<th scope="row">98.5</th>
<td>118.092</td>
<td>119.3774</td>
<td>121.3855</td>
<td>124.8207</td>
<td>128.7576</td>
<td>132.8255</td>
<td>136.6024</td>
<td>138.9166</td>
<td>140.4415</td>
</tr>
<tr>
<th scope="row">99.5</th>
<td>118.4924</td>
<td>119.7852</td>
<td>121.8047</td>
<td>125.2584</td>
<td>129.2152</td>
<td>133.302</td>
<td>137.095</td>
<td>139.4184</td>
<td>140.9492</td>
</tr>
<tr>
<th scope="row">100.5</th>
<td>118.8869</td>
<td>120.1873</td>
<td>122.2182</td>
<td>125.6906</td>
<td>129.6675</td>
<td>133.7734</td>
<td>137.5828</td>
<td>139.9155</td>
<td>141.4521</td>
</tr>
<tr>
<th scope="row">101.5</th>
<td>119.2757</td>
<td>120.5838</td>
<td>122.6263</td>
<td>126.1177</td>
<td>130.1148</td>
<td>134.2401</td>
<td>138.066</td>
<td>140.4082</td>
<td>141.9507</td>
</tr>
<tr>
<th scope="row">102.5</th>
<td>119.659</td>
<td>120.9748</td>
<td>123.0291</td>
<td>126.5396</td>
<td>130.5574</td>
<td>134.7023</td>
<td>138.545</td>
<td>140.8968</td>
<td>142.4454</td>
</tr>
<tr>
<th scope="row">103.5</th>
<td>120.037</td>
<td>121.3606</td>
<td>123.4268</td>
<td>126.9568</td>
<td>130.9954</td>
<td>135.1604</td>
<td>139.0201</td>
<td>141.3817</td>
<td>142.9364</td>
</tr>
<tr>
<th scope="row">104.5</th>
<td>120.4097</td>
<td>121.7413</td>
<td>123.8196</td>
<td>127.3694</td>
<td>131.4293</td>
<td>135.6146</td>
<td>139.4918</td>
<td>141.8633</td>
<td>143.4244</td>
</tr>
<tr>
<th scope="row">105.5</th>
<td>120.7775</td>
<td>122.1171</td>
<td>124.2078</td>
<td>127.7777</td>
<td>131.8593</td>
<td>136.0654</td>
<td>139.9604</td>
<td>142.3422</td>
<td>143.9098</td>
</tr>
<tr>
<th scope="row">106.5</th>
<td>121.1405</td>
<td>122.4884</td>
<td>124.5916</td>
<td>128.1822</td>
<td>132.2859</td>
<td>136.5132</td>
<td>140.4265</td>
<td>142.8188</td>
<td>144.393</td>
</tr>
<tr>
<th scope="row">107.5</th>
<td>121.4991</td>
<td>122.8555</td>
<td>124.9715</td>
<td>128.5831</td>
<td>132.7094</td>
<td>136.9585</td>
<td>140.8906</td>
<td>143.2937</td>
<td>144.8747</td>
</tr>
<tr>
<th scope="row">108.5</th>
<td>121.8537</td>
<td>123.2186</td>
<td>125.3478</td>
<td>128.9808</td>
<td>133.1304</td>
<td>137.4018</td>
<td>141.3532</td>
<td>143.7674</td>
<td>145.3555</td>
</tr>
<tr>
<th scope="row">109.5</th>
<td>122.2044</td>
<td>123.5782</td>
<td>125.7208</td>
<td>129.3759</td>
<td>133.5493</td>
<td>137.8437</td>
<td>141.8149</td>
<td>144.2406</td>
<td>145.8359</td>
</tr>
<tr>
<th scope="row">110.5</th>
<td>122.5518</td>
<td>123.9347</td>
<td>126.0911</td>
<td>129.7689</td>
<td>133.9667</td>
<td>138.2847</td>
<td>142.2764</td>
<td>144.7139</td>
<td>146.3167</td>
</tr>
<tr>
<th scope="row">111.5</th>
<td>122.8963</td>
<td>124.2885</td>
<td>126.4592</td>
<td>130.1603</td>
<td>134.3832</td>
<td>138.7256</td>
<td>142.7382</td>
<td>145.1879</td>
<td>146.7984</td>
</tr>
<tr>
<th scope="row">112.5</th>
<td>123.2384</td>
<td>124.6402</td>
<td>126.8255</td>
<td>130.5506</td>
<td>134.7995</td>
<td>139.1669</td>
<td>143.2012</td>
<td>145.6634</td>
<td>147.2818</td>
</tr>
<tr>
<th scope="row">113.5</th>
<td>123.5785</td>
<td>124.9902</td>
<td>127.1907</td>
<td>130.9406</td>
<td>135.2163</td>
<td>139.6094</td>
<td>143.666</td>
<td>146.141</td>
<td>147.7676</td>
</tr>
<tr>
<th scope="row">114.5</th>
<td>123.9173</td>
<td>125.3393</td>
<td>127.5554</td>
<td>131.3309</td>
<td>135.6342</td>
<td>140.0538</td>
<td>144.1333</td>
<td>146.6215</td>
<td>148.2564</td>
</tr>
<tr>
<th scope="row">115.5</th>
<td>124.2553</td>
<td>125.688</td>
<td>127.9203</td>
<td>131.7223</td>
<td>136.054</td>
<td>140.501</td>
<td>144.6039</td>
<td>147.1056</td>
<td>148.7491</td>
</tr>
<tr>
<th scope="row">116.5</th>
<td>124.5933</td>
<td>126.0371</td>
<td>128.2861</td>
<td>132.1156</td>
<td>136.4766</td>
<td>140.9516</td>
<td>145.0785</td>
<td>147.594</td>
<td>149.2461</td>
</tr>
<tr>
<th scope="row">117.5</th>
<td>124.932</td>
<td>126.3872</td>
<td>128.6537</td>
<td>132.5115</td>
<td>136.9027</td>
<td>141.4065</td>
<td>145.5579</td>
<td>148.0874</td>
<td>149.7484</td>
</tr>
<tr>
<th scope="row">118.5</th>
<td>125.2721</td>
<td>126.7392</td>
<td>129.0238</td>
<td>132.9109</td>
<td>137.3333</td>
<td>141.8665</td>
<td>146.0429</td>
<td>148.5865</td>
<td>150.2564</td>
</tr>
<tr>
<th scope="row">119.5</th>
<td>125.6144</td>
<td>127.094</td>
<td>129.3973</td>
<td>133.3147</td>
<td>137.7691</td>
<td>142.3324</td>
<td>146.5341</td>
<td>149.092</td>
<td>150.7707</td>
</tr>
<tr>
<th scope="row">120.5</th>
<td>125.9599</td>
<td>127.4524</td>
<td>129.7752</td>
<td>133.7239</td>
<td>138.2112</td>
<td>142.8051</td>
<td>147.0322</td>
<td>149.6044</td>
<td>151.292</td>
</tr>
<tr>
<th scope="row">121.5</th>
<td>126.3095</td>
<td>127.8154</td>
<td>130.1584</td>
<td>134.1394</td>
<td>138.6602</td>
<td>143.2852</td>
<td>147.5379</td>
<td>150.1242</td>
<td>151.8205</td>
</tr>
<tr>
<th scope="row">122.5</th>
<td>126.6641</td>
<td>128.184</td>
<td>130.5479</td>
<td>134.562</td>
<td>139.1172</td>
<td>143.7735</td>
<td>148.0517</td>
<td>150.652</td>
<td>152.3568</td>
</tr>
<tr>
<th scope="row">123.5</th>
<td>127.0248</td>
<td>128.5591</td>
<td>130.9446</td>
<td>134.9929</td>
<td>139.5829</td>
<td>144.2707</td>
<td>148.5741</td>
<td>151.188</td>
<td>152.9011</td>
</tr>
<tr>
<th scope="row">124.5</th>
<td>127.3926</td>
<td>128.9419</td>
<td>131.3496</td>
<td>135.4328</td>
<td>140.0581</td>
<td>144.7773</td>
<td>149.1054</td>
<td>151.7325</td>
<td>153.4534</td>
</tr>
<tr>
<th scope="row">125.5</th>
<td>127.7687</td>
<td>129.3334</td>
<td>131.7639</td>
<td>135.8826</td>
<td>140.5435</td>
<td>145.2938</td>
<td>149.646</td>
<td>152.2856</td>
<td>154.0139</td>
</tr>
<tr>
<th scope="row">126.5</th>
<td>128.1541</td>
<td>129.7346</td>
<td>132.1885</td>
<td>136.3433</td>
<td>141.0397</td>
<td>145.8206</td>
<td>150.196</td>
<td>152.8473</td>
<td>154.5824</td>
</tr>
<tr>
<th scope="row">127.5</th>
<td>128.5499</td>
<td>130.1467</td>
<td>132.6243</td>
<td>136.8154</td>
<td>141.5472</td>
<td>146.3579</td>
<td>150.7552</td>
<td>153.4174</td>
<td>155.1586</td>
</tr>
<tr>
<th scope="row">128.5</th>
<td>128.9573</td>
<td>130.5705</td>
<td>133.0721</td>
<td>137.2997</td>
<td>142.0664</td>
<td>146.9059</td>
<td>151.3236</td>
<td>153.9955</td>
<td>155.742</td>
</tr>
<tr>
<th scope="row">129.5</th>
<td>129.3772</td>
<td>131.0071</td>
<td>133.5329</td>
<td>137.7967</td>
<td>142.5974</td>
<td>147.4643</td>
<td>151.9008</td>
<td>154.5812</td>
<td>156.3321</td>
</tr>
<tr>
<th scope="row">130.5</th>
<td>129.8106</td>
<td>131.4573</td>
<td>134.0072</td>
<td>138.3067</td>
<td>143.1404</td>
<td>148.0329</td>
<td>152.4861</td>
<td>155.1737</td>
<td>156.928</td>
</tr>
<tr>
<th scope="row">131.5</th>
<td>130.2585</td>
<td>131.9218</td>
<td>134.4955</td>
<td>138.83</td>
<td>143.695</td>
<td>148.6111</td>
<td>153.079</td>
<td>155.7721</td>
<td>157.5288</td>
</tr>
<tr>
<th scope="row">132.5</th>
<td>130.7217</td>
<td>132.4013</td>
<td>134.9983</td>
<td>139.3664</td>
<td>144.2609</td>
<td>149.1984</td>
<td>153.6783</td>
<td>156.3755</td>
<td>158.1335</td>
</tr>
<tr>
<th scope="row">133.5</th>
<td>131.2006</td>
<td>132.8962</td>
<td>135.5157</td>
<td>139.9157</td>
<td>144.8376</td>
<td>149.7937</td>
<td>154.283</td>
<td>156.9825</td>
<td>158.7407</td>
</tr>
<tr>
<th scope="row">134.5</th>
<td>131.6958</td>
<td>133.4067</td>
<td>136.0476</td>
<td>140.4775</td>
<td>145.424</td>
<td>150.3959</td>
<td>154.8918</td>
<td>157.5918</td>
<td>159.3491</td>
</tr>
<tr>
<th scope="row">135.5</th>
<td>132.2074</td>
<td>133.9328</td>
<td>136.5937</td>
<td>141.051</td>
<td>146.0192</td>
<td>151.0036</td>
<td>155.5032</td>
<td>158.202</td>
<td>159.9571</td>
</tr>
<tr>
<th scope="row">136.5</th>
<td>132.7354</td>
<td>134.4742</td>
<td>137.1534</td>
<td>141.6352</td>
<td>146.6217</td>
<td>151.6153</td>
<td>156.1156</td>
<td>158.8115</td>
<td>160.5633</td>
</tr>
<tr>
<th scope="row">137.5</th>
<td>133.2795</td>
<td>135.0304</td>
<td>137.7259</td>
<td>142.2288</td>
<td>147.23</td>
<td>152.2293</td>
<td>156.7273</td>
<td>159.4185</td>
<td>161.166</td>
</tr>
<tr>
<th scope="row">138.5</th>
<td>133.8388</td>
<td>135.6004</td>
<td>138.31</td>
<td>142.8304</td>
<td>147.8424</td>
<td>152.8438</td>
<td>157.3365</td>
<td>160.0213</td>
<td>161.7634</td>
</tr>
<tr>
<th scope="row">139.5</th>
<td>134.4125</td>
<td>136.1831</td>
<td>138.9043</td>
<td>143.4381</td>
<td>148.4569</td>
<td>153.4568</td>
<td>157.9413</td>
<td>160.6182</td>
<td>162.3541</td>
</tr>
<tr>
<th scope="row">140.5</th>
<td>134.9993</td>
<td>136.7769</td>
<td>139.507</td>
<td>144.0501</td>
<td>149.0714</td>
<td>154.0662</td>
<td>158.5398</td>
<td>161.2075</td>
<td>162.9363</td>
</tr>
<tr>
<th scope="row">141.5</th>
<td>135.5973</td>
<td>137.3801</td>
<td>140.1161</td>
<td>144.6641</td>
<td>149.6839</td>
<td>154.67</td>
<td>159.1302</td>
<td>161.7874</td>
<td>163.5084</td>
</tr>
<tr>
<th scope="row">142.5</th>
<td>136.2047</td>
<td>137.9905</td>
<td>140.7295</td>
<td>145.278</td>
<td>150.292</td>
<td>155.2663</td>
<td>159.7107</td>
<td>162.3564</td>
<td>164.069</td>
</tr>
<tr>
<th scope="row">143.5</th>
<td>136.8191</td>
<td>138.6058</td>
<td>141.3448</td>
<td>145.8893</td>
<td>150.8936</td>
<td>155.8529</td>
<td>160.2796</td>
<td>162.9129</td>
<td>164.6167</td>
</tr>
<tr>
<th scope="row">144.5</th>
<td>137.4381</td>
<td>139.2236</td>
<td>141.9594</td>
<td>146.4958</td>
<td>151.4866</td>
<td>156.428</td>
<td>160.8353</td>
<td>163.4555</td>
<td>165.1503</td>
</tr>
<tr>
<th scope="row">145.5</th>
<td>138.0588</td>
<td>139.841</td>
<td>142.5709</td>
<td>147.0949</td>
<td>152.0687</td>
<td>156.9899</td>
<td>161.3764</td>
<td>163.983</td>
<td>165.6685</td>
</tr>
<tr>
<th scope="row">146.5</th>
<td>138.6784</td>
<td>140.4554</td>
<td>143.1767</td>
<td>147.6845</td>
<td>152.6381</td>
<td>157.5369</td>
<td>161.9016</td>
<td>164.4943</td>
<td>166.1706</td>
</tr>
<tr>
<th scope="row">147.5</th>
<td>139.2941</td>
<td>141.064</td>
<td>143.7741</td>
<td>148.2623</td>
<td>153.193</td>
<td>158.0677</td>
<td>162.4097</td>
<td>164.9885</td>
<td>166.6555</td>
</tr>
<tr>
<th scope="row">148.5</th>
<td>139.9028</td>
<td>141.6641</td>
<td>144.3607</td>
<td>148.8263</td>
<td>153.7317</td>
<td>158.581</td>
<td>162.8999</td>
<td>165.4648</td>
<td>167.1228</td>
</tr>
<tr>
<th scope="row">149.5</th>
<td>140.5019</td>
<td>142.253</td>
<td>144.9342</td>
<td>149.3747</td>
<td>154.2529</td>
<td>159.0758</td>
<td>163.3715</td>
<td>165.9227</td>
<td>167.572</td>
</tr>
<tr>
<th scope="row">150.5</th>
<td>141.0885</td>
<td>142.8283</td>
<td>145.4925</td>
<td>149.9059</td>
<td>154.7555</td>
<td>159.5513</td>
<td>163.8239</td>
<td>166.3618</td>
<td>168.0027</td>
</tr>
<tr>
<th scope="row">151.5</th>
<td>141.6602</td>
<td>143.3877</td>
<td>146.0338</td>
<td>150.4184</td>
<td>155.2385</td>
<td>160.007</td>
<td>164.2568</td>
<td>166.7819</td>
<td>168.4147</td>
</tr>
<tr>
<th scope="row">152.5</th>
<td>142.2148</td>
<td>143.9294</td>
<td>146.5564</td>
<td>150.9113</td>
<td>155.7012</td>
<td>160.4425</td>
<td>164.6701</td>
<td>167.1829</td>
<td>168.808</td>
</tr>
<tr>
<th scope="row">153.5</th>
<td>142.7504</td>
<td>144.4516</td>
<td>147.059</td>
<td>151.3835</td>
<td>156.1432</td>
<td>160.8576</td>
<td>165.0637</td>
<td>167.5648</td>
<td>169.1827</td>
</tr>
<tr>
<th scope="row">154.5</th>
<td>143.2654</td>
<td>144.953</td>
<td>147.5405</td>
<td>151.8346</td>
<td>156.5643</td>
<td>161.2524</td>
<td>165.4378</td>
<td>167.9278</td>
<td>169.5391</td>
</tr>
<tr>
<th scope="row">155.5</th>
<td>143.7584</td>
<td>145.4325</td>
<td>148.0002</td>
<td>152.2642</td>
<td>156.9644</td>
<td>161.627</td>
<td>165.7928</td>
<td>168.2723</td>
<td>169.8773</td>
</tr>
<tr>
<th scope="row">156.5</th>
<td>144.2287</td>
<td>145.8894</td>
<td>148.4376</td>
<td>152.6721</td>
<td>157.3437</td>
<td>161.9818</td>
<td>166.1289</td>
<td>168.5987</td>
<td>170.1979</td>
</tr>
<tr>
<th scope="row">157.5</th>
<td>144.6756</td>
<td>146.3232</td>
<td>148.8525</td>
<td>153.0584</td>
<td>157.7025</td>
<td>162.3172</td>
<td>166.4466</td>
<td>168.9074</td>
<td>170.5013</td>
</tr>
<tr>
<th scope="row">158.5</th>
<td>145.0987</td>
<td>146.7338</td>
<td>149.2449</td>
<td>153.4234</td>
<td>158.0411</td>
<td>162.6338</td>
<td>166.7467</td>
<td>169.199</td>
<td>170.7881</td>
</tr>
<tr>
<th scope="row">159.5</th>
<td>145.4981</td>
<td>147.1213</td>
<td>149.615</td>
<td>153.7674</td>
<td>158.3603</td>
<td>162.9321</td>
<td>167.0296</td>
<td>169.4742</td>
<td>171.0587</td>
</tr>
<tr>
<th scope="row">160.5</th>
<td>145.874</td>
<td>147.4859</td>
<td>149.9633</td>
<td>154.0911</td>
<td>158.6606</td>
<td>163.2129</td>
<td>167.2961</td>
<td>169.7335</td>
<td>171.314</td>
</tr>
<tr>
<th scope="row">161.5</th>
<td>146.2269</td>
<td>147.8281</td>
<td>150.2902</td>
<td>154.3951</td>
<td>158.9427</td>
<td>163.477</td>
<td>167.5469</td>
<td>169.9777</td>
<td>171.5544</td>
</tr>
<tr>
<th scope="row">162.5</th>
<td>146.5573</td>
<td>148.1487</td>
<td>150.5966</td>
<td>154.6801</td>
<td>159.2075</td>
<td>163.725</td>
<td>167.7826</td>
<td>170.2074</td>
<td>171.7807</td>
</tr>
<tr>
<th scope="row">163.5</th>
<td>146.866</td>
<td>148.4483</td>
<td>150.8831</td>
<td>154.947</td>
<td>159.4557</td>
<td>163.9577</td>
<td>168.0042</td>
<td>170.4234</td>
<td>171.9935</td>
</tr>
<tr>
<th scope="row">164.5</th>
<td>147.1539</td>
<td>148.7279</td>
<td>151.1507</td>
<td>155.1966</td>
<td>159.6882</td>
<td>164.1761</td>
<td>168.2122</td>
<td>170.6263</td>
<td>172.1936</td>
</tr>
<tr>
<th scope="row">165.5</th>
<td>147.4219</td>
<td>148.9885</td>
<td>151.4003</td>
<td>155.4298</td>
<td>159.9058</td>
<td>164.3808</td>
<td>168.4075</td>
<td>170.817</td>
<td>172.3816</td>
</tr>
<tr>
<th scope="row">166.5</th>
<td>147.6712</td>
<td>149.2309</td>
<td>151.6329</td>
<td>155.6475</td>
<td>160.1094</td>
<td>164.5726</td>
<td>168.5907</td>
<td>170.9959</td>
<td>172.5582</td>
</tr>
<tr>
<th scope="row">167.5</th>
<td>147.9026</td>
<td>149.4562</td>
<td>151.8494</td>
<td>155.8507</td>
<td>160.2997</td>
<td>164.7523</td>
<td>168.7626</td>
<td>171.1639</td>
<td>172.7239</td>
</tr>
<tr>
<th scope="row">168.5</th>
<td>148.1173</td>
<td>149.6655</td>
<td>152.0508</td>
<td>156.0401</td>
<td>160.4777</td>
<td>164.9206</td>
<td>168.9239</td>
<td>171.3216</td>
<td>172.8796</td>
</tr>
<tr>
<th scope="row">169.5</th>
<td>148.3164</td>
<td>149.8598</td>
<td>152.2381</td>
<td>156.2167</td>
<td>160.6441</td>
<td>165.0783</td>
<td>169.0751</td>
<td>171.4696</td>
<td>173.0257</td>
</tr>
<tr>
<th scope="row">170.5</th>
<td>148.5009</td>
<td>150.04</td>
<td>152.4121</td>
<td>156.3813</td>
<td>160.7995</td>
<td>165.226</td>
<td>169.217</td>
<td>171.6085</td>
<td>173.1628</td>
</tr>
<tr>
<th scope="row">171.5</th>
<td>148.6717</td>
<td>150.2072</td>
<td>152.5738</td>
<td>156.5348</td>
<td>160.9449</td>
<td>165.3644</td>
<td>169.3501</td>
<td>171.7388</td>
<td>173.2915</td>
</tr>
<tr>
<th scope="row">172.5</th>
<td>148.8299</td>
<td>150.3621</td>
<td>152.7241</td>
<td>156.6778</td>
<td>161.0808</td>
<td>165.4941</td>
<td>169.4749</td>
<td>171.8611</td>
<td>173.4124</td>
</tr>
<tr>
<th scope="row">173.5</th>
<td>148.9764</td>
<td>150.5059</td>
<td>152.8638</td>
<td>156.8112</td>
<td>161.2079</td>
<td>165.6157</td>
<td>169.5921</td>
<td>171.976</td>
<td>173.5258</td>
</tr>
<tr>
<th scope="row">174.5</th>
<td>149.1121</td>
<td>150.6392</td>
<td>152.9936</td>
<td>156.9356</td>
<td>161.3268</td>
<td>165.7297</td>
<td>169.7022</td>
<td>172.0839</td>
<td>173.6324</td>
</tr>
<tr>
<th scope="row">175.5</th>
<td>149.2377</td>
<td>150.7629</td>
<td>153.1143</td>
<td>157.0517</td>
<td>161.4381</td>
<td>165.8366</td>
<td>169.8055</td>
<td>172.1853</td>
<td>173.7326</td>
</tr>
<tr>
<th scope="row">176.5</th>
<td>149.3542</td>
<td>150.8777</td>
<td>153.2266</td>
<td>157.16</td>
<td>161.5423</td>
<td>165.9369</td>
<td>169.9026</td>
<td>172.2806</td>
<td>173.8267</td>
</tr>
<tr>
<th scope="row">177.5</th>
<td>149.4622</td>
<td>150.9843</td>
<td>153.3312</td>
<td>157.2612</td>
<td>161.6399</td>
<td>166.0312</td>
<td>169.9939</td>
<td>172.3701</td>
<td>173.9152</td>
</tr>
<tr>
<th scope="row">178.5</th>
<td>149.5623</td>
<td>151.0833</td>
<td>153.4286</td>
<td>157.3558</td>
<td>161.7315</td>
<td>166.1197</td>
<td>170.0798</td>
<td>172.4544</td>
<td>173.9984</td>
</tr>
<tr>
<th scope="row">179.5</th>
<td>149.6553</td>
<td>151.1754</td>
<td>153.5193</td>
<td>157.4443</td>
<td>161.8174</td>
<td>166.2029</td>
<td>170.1606</td>
<td>172.5337</td>
<td>174.0768</td>
</tr>
<tr>
<th scope="row">180.5</th>
<td>149.7416</td>
<td>151.2611</td>
<td>153.604</td>
<td>157.5271</td>
<td>161.898</td>
<td>166.2812</td>
<td>170.2366</td>
<td>172.6084</td>
<td>174.1505</td>
</tr>
<tr>
<th scope="row">181.5</th>
<td>149.8219</td>
<td>151.341</td>
<td>153.683</td>
<td>157.6047</td>
<td>161.9738</td>
<td>166.3549</td>
<td>170.3083</td>
<td>172.6787</td>
<td>174.22</td>
</tr>
<tr>
<th scope="row">182.5</th>
<td>149.8967</td>
<td>151.4154</td>
<td>153.7569</td>
<td>157.6775</td>
<td>162.045</td>
<td>166.4244</td>
<td>170.3759</td>
<td>172.7451</td>
<td>174.2855</td>
</tr>
<tr>
<th scope="row">183.5</th>
<td>149.9663</td>
<td>151.4848</td>
<td>153.826</td>
<td>157.7458</td>
<td>162.112</td>
<td>166.4898</td>
<td>170.4396</td>
<td>172.8076</td>
<td>174.3472</td>
</tr>
<tr>
<th scope="row">184.5</th>
<td>150.0312</td>
<td>151.5497</td>
<td>153.8907</td>
<td>157.8099</td>
<td>162.1752</td>
<td>166.5516</td>
<td>170.4997</td>
<td>172.8667</td>
<td>174.4055</td>
</tr>
<tr>
<th scope="row">185.5</th>
<td>150.0918</td>
<td>151.6103</td>
<td>153.9513</td>
<td>157.8702</td>
<td>162.2347</td>
<td>166.6099</td>
<td>170.5566</td>
<td>172.9225</td>
<td>174.4606</td>
</tr>
<tr>
<th scope="row">186.5</th>
<td>150.1484</td>
<td>151.6671</td>
<td>154.0082</td>
<td>157.927</td>
<td>162.2908</td>
<td>166.6649</td>
<td>170.6103</td>
<td>172.9752</td>
<td>174.5125</td>
</tr>
<tr>
<th scope="row">187.5</th>
<td>150.2014</td>
<td>151.7203</td>
<td>154.0616</td>
<td>157.9804</td>
<td>162.3439</td>
<td>166.717</td>
<td>170.6611</td>
<td>173.025</td>
<td>174.5617</td>
</tr>
<tr>
<th scope="row">188.5</th>
<td>150.251</td>
<td>151.7702</td>
<td>154.1119</td>
<td>158.0308</td>
<td>162.394</td>
<td>166.7663</td>
<td>170.7091</td>
<td>173.0722</td>
<td>174.6082</td>
</tr>
<tr>
<th scope="row">189.5</th>
<td>150.2975</td>
<td>151.8171</td>
<td>154.1592</td>
<td>158.0784</td>
<td>162.4414</td>
<td>166.8129</td>
<td>170.7546</td>
<td>173.1168</td>
<td>174.6522</td>
</tr>
<tr>
<th scope="row">190.5</th>
<td>150.3412</td>
<td>151.8612</td>
<td>154.2037</td>
<td>158.1234</td>
<td>162.4862</td>
<td>166.8571</td>
<td>170.7978</td>
<td>173.1591</td>
<td>174.6938</td>
</tr>
<tr>
<th scope="row">191.5</th>
<td>150.3823</td>
<td>151.9027</td>
<td>154.2457</td>
<td>158.1659</td>
<td>162.5287</td>
<td>166.899</td>
<td>170.8387</td>
<td>173.1992</td>
<td>174.7333</td>
</tr>
<tr>
<th scope="row">192.5</th>
<td>150.4209</td>
<td>151.9418</td>
<td>154.2854</td>
<td>158.2061</td>
<td>162.569</td>
<td>166.9388</td>
<td>170.8775</td>
<td>173.2373</td>
<td>174.7708</td>
</tr>
<tr>
<th scope="row">193.5</th>
<td>150.4573</td>
<td>151.9787</td>
<td>154.3229</td>
<td>158.2442</td>
<td>162.6072</td>
<td>166.9766</td>
<td>170.9144</td>
<td>173.2734</td>
<td>174.8063</td>
</tr>
<tr>
<th scope="row">194.5</th>
<td>150.4917</td>
<td>152.0135</td>
<td>154.3584</td>
<td>158.2803</td>
<td>162.6435</td>
<td>167.0125</td>
<td>170.9494</td>
<td>173.3077</td>
<td>174.84</td>
</tr>
<tr>
<th scope="row">195.5</th>
<td>150.5241</td>
<td>152.0465</td>
<td>154.3919</td>
<td>158.3146</td>
<td>162.6781</td>
<td>167.0466</td>
<td>170.9827</td>
<td>173.3402</td>
<td>174.8721</td>
</tr>
<tr>
<th scope="row">196.5</th>
<td>150.5547</td>
<td>152.0776</td>
<td>154.4238</td>
<td>158.3472</td>
<td>162.7109</td>
<td>167.0791</td>
<td>171.0144</td>
<td>173.3712</td>
<td>174.9025</td>
</tr>
<tr>
<th scope="row">197.5</th>
<td>150.5837</td>
<td>152.1072</td>
<td>154.454</td>
<td>158.3782</td>
<td>162.7421</td>
<td>167.11</td>
<td>171.0446</td>
<td>173.4007</td>
<td>174.9314</td>
</tr>
<tr>
<th scope="row">198.5</th>
<td>150.6111</td>
<td>152.1352</td>
<td>154.4827</td>
<td>158.4077</td>
<td>162.7719</td>
<td>167.1395</td>
<td>171.0733</td>
<td>173.4288</td>
<td>174.959</td>
</tr>
<tr>
<th scope="row">199.5</th>
<td>150.6372</td>
<td>152.1617</td>
<td>154.51</td>
<td>158.4357</td>
<td>162.8002</td>
<td>167.1676</td>
<td>171.1007</td>
<td>173.4555</td>
<td>174.9852</td>
</tr>
<tr>
<th scope="row">200.5</th>
<td>150.6619</td>
<td>152.187</td>
<td>154.5359</td>
<td>158.4625</td>
<td>162.8273</td>
<td>167.1944</td>
<td>171.1268</td>
<td>173.481</td>
<td>175.0102</td>
</tr>
<tr>
<th scope="row">201.5</th>
<td>150.6854</td>
<td>152.211</td>
<td>154.5607</td>
<td>158.4879</td>
<td>162.8531</td>
<td>167.22</td>
<td>171.1517</td>
<td>173.5053</td>
<td>175.034</td>
</tr>
<tr>
<th scope="row">202.5</th>
<td>150.7077</td>
<td>152.2339</td>
<td>154.5842</td>
<td>158.5123</td>
<td>162.8778</td>
<td>167.2444</td>
<td>171.1754</td>
<td>173.5284</td>
<td>175.0567</td>
</tr>
<tr>
<th scope="row">203.5</th>
<td>150.7289</td>
<td>152.2556</td>
<td>154.6067</td>
<td>158.5355</td>
<td>162.9013</td>
<td>167.2677</td>
<td>171.1981</td>
<td>173.5505</td>
<td>175.0783</td>
</tr>
<tr>
<th scope="row">204.5</th>
<td>150.7491</td>
<td>152.2764</td>
<td>154.6281</td>
<td>158.5577</td>
<td>162.9238</td>
<td>167.29</td>
<td>171.2198</td>
<td>173.5716</td>
<td>175.099</td>
</tr>
<tr>
<th scope="row">205.5</th>
<td>150.7684</td>
<td>152.2962</td>
<td>154.6486</td>
<td>158.5789</td>
<td>162.9454</td>
<td>167.3114</td>
<td>171.2405</td>
<td>173.5918</td>
<td>175.1187</td>
</tr>
<tr>
<th scope="row">206.5</th>
<td>150.7868</td>
<td>152.3151</td>
<td>154.6681</td>
<td>158.5992</td>
<td>162.966</td>
<td>167.3318</td>
<td>171.2604</td>
<td>173.6111</td>
<td>175.1376</td>
</tr>
<tr>
<th scope="row">207.5</th>
<td>150.8044</td>
<td>152.3332</td>
<td>154.6868</td>
<td>158.6187</td>
<td>162.9858</td>
<td>167.3514</td>
<td>171.2793</td>
<td>173.6295</td>
<td>175.1556</td>
</tr>
<tr>
<th scope="row">208.5</th>
<td>150.8211</td>
<td>152.3504</td>
<td>154.7047</td>
<td>158.6373</td>
<td>163.0047</td>
<td>167.3701</td>
<td>171.2975</td>
<td>173.6471</td>
<td>175.1728</td>
</tr>
<tr>
<th scope="row">209.5</th>
<td>150.8372</td>
<td>152.3669</td>
<td>154.7218</td>
<td>158.6551</td>
<td>163.0228</td>
<td>167.3881</td>
<td>171.3149</td>
<td>173.664</td>
<td>175.1892</td>
</tr>
<tr>
<th scope="row">210.5</th>
<td>150.8525</td>
<td>152.3827</td>
<td>154.7382</td>
<td>158.6722</td>
<td>163.0402</td>
<td>167.4053</td>
<td>171.3315</td>
<td>173.6802</td>
<td>175.205</td>
</tr>
<tr>
<th scope="row">211.5</th>
<td>150.8672</td>
<td>152.3979</td>
<td>154.754</td>
<td>158.6886</td>
<td>163.0569</td>
<td>167.4218</td>
<td>171.3475</td>
<td>173.6956</td>
<td>175.2201</td>
</tr>
<tr>
<th scope="row">212.5</th>
<td>150.8812</td>
<td>152.4124</td>
<td>154.769</td>
<td>158.7043</td>
<td>163.0729</td>
<td>167.4376</td>
<td>171.3628</td>
<td>173.7104</td>
<td>175.2345</td>
</tr>
<tr>
<th scope="row">213.5</th>
<td>150.8947</td>
<td>152.4263</td>
<td>154.7835</td>
<td>158.7194</td>
<td>163.0882</td>
<td>167.4528</td>
<td>171.3775</td>
<td>173.7246</td>
<td>175.2483</td>
</tr>
<tr>
<th scope="row">214.5</th>
<td>150.9076</td>
<td>152.4396</td>
<td>154.7974</td>
<td>158.7339</td>
<td>163.103</td>
<td>167.4674</td>
<td>171.3915</td>
<td>173.7382</td>
<td>175.2616</td>
</tr>
<tr>
<th scope="row">215.5</th>
<td>150.92</td>
<td>152.4524</td>
<td>154.8107</td>
<td>158.7478</td>
<td>163.1172</td>
<td>167.4814</td>
<td>171.405</td>
<td>173.7513</td>
<td>175.2742</td>
</tr>
<tr>
<th scope="row">216.5</th>
<td>150.9319</td>
<td>152.4647</td>
<td>154.8235</td>
<td>158.7612</td>
<td>163.1308</td>
<td>167.4948</td>
<td>171.418</td>
<td>173.7638</td>
<td>175.2864</td>
</tr>
<tr>
<th scope="row">217.5</th>
<td>150.9433</td>
<td>152.4765</td>
<td>154.8358</td>
<td>158.774</td>
<td>163.1439</td>
<td>167.5078</td>
<td>171.4304</td>
<td>173.7758</td>
<td>175.2981</td>
</tr>
<tr>
<th scope="row">218.5</th>
<td>150.9542</td>
<td>152.4878</td>
<td>154.8476</td>
<td>158.7864</td>
<td>163.1565</td>
<td>167.5202</td>
<td>171.4424</td>
<td>173.7873</td>
<td>175.3093</td>
</tr>
<tr>
<th scope="row">219.5</th>
<td>150.9647</td>
<td>152.4987</td>
<td>154.859</td>
<td>158.7983</td>
<td>163.1686</td>
<td>167.5321</td>
<td>171.4538</td>
<td>173.7984</td>
<td>175.32</td>
</tr>
<tr>
<th scope="row">220.5</th>
<td>150.9749</td>
<td>152.5092</td>
<td>154.8699</td>
<td>158.8097</td>
<td>163.1802</td>
<td>167.5436</td>
<td>171.4649</td>
<td>173.809</td>
<td>175.3303</td>
</tr>
<tr>
<th scope="row">221.5</th>
<td>150.9846</td>
<td>152.5192</td>
<td>154.8804</td>
<td>158.8207</td>
<td>163.1914</td>
<td>167.5546</td>
<td>171.4755</td>
<td>173.8192</td>
<td>175.3402</td>
</tr>
<tr>
<th scope="row">222.5</th>
<td>150.9939</td>
<td>152.5289</td>
<td>154.8905</td>
<td>158.8313</td>
<td>163.2022</td>
<td>167.5653</td>
<td>171.4856</td>
<td>173.829</td>
<td>175.3497</td>
</tr>
<tr>
<th scope="row">223.5</th>
<td>151.0029</td>
<td>152.5382</td>
<td>154.9003</td>
<td>158.8415</td>
<td>163.2126</td>
<td>167.5755</td>
<td>171.4954</td>
<td>173.8384</td>
<td>175.3588</td>
</tr>
<tr>
<th scope="row">224.5</th>
<td>151.0115</td>
<td>152.5472</td>
<td>154.9096</td>
<td>158.8514</td>
<td>163.2226</td>
<td>167.5853</td>
<td>171.5049</td>
<td>173.8474</td>
<td>175.3675</td>
</tr>
<tr>
<th scope="row">225.5</th>
<td>151.0198</td>
<td>152.5558</td>
<td>154.9187</td>
<td>158.8608</td>
<td>163.2322</td>
<td>167.5948</td>
<td>171.5139</td>
<td>173.8561</td>
<td>175.376</td>
</tr>
<tr>
<th scope="row">226.5</th>
<td>151.0279</td>
<td>152.5641</td>
<td>154.9273</td>
<td>158.8699</td>
<td>163.2415</td>
<td>167.6039</td>
<td>171.5226</td>
<td>173.8645</td>
<td>175.384</td>
</tr>
<tr>
<th scope="row">227.5</th>
<td>151.0356</td>
<td>152.5721</td>
<td>154.9357</td>
<td>158.8787</td>
<td>163.2504</td>
<td>167.6127</td>
<td>171.531</td>
<td>173.8725</td>
<td>175.3918</td>
</tr>
<tr>
<th scope="row">228.5</th>
<td>151.043</td>
<td>152.5798</td>
<td>154.9438</td>
<td>158.8872</td>
<td>163.259</td>
<td>167.6211</td>
<td>171.5391</td>
<td>173.8802</td>
<td>175.3993</td>
</tr>
<tr>
<th scope="row">229.5</th>
<td>151.0501</td>
<td>152.5873</td>
<td>154.9516</td>
<td>158.8953</td>
<td>163.2673</td>
<td>167.6293</td>
<td>171.5468</td>
<td>173.8877</td>
<td>175.4064</td>
</tr>
<tr>
<th scope="row">230.5</th>
<td>151.057</td>
<td>152.5944</td>
<td>154.959</td>
<td>158.9032</td>
<td>163.2753</td>
<td>167.6371</td>
<td>171.5543</td>
<td>173.8948</td>
<td>175.4133</td>
</tr>
<tr>
<th scope="row">231.5</th>
<td>151.0636</td>
<td>152.6013</td>
<td>154.9663</td>
<td>158.9107</td>
<td>163.283</td>
<td>167.6446</td>
<td>171.5615</td>
<td>173.9017</td>
<td>175.42</td>
</tr>
<tr>
<th scope="row">232.5</th>
<td>151.07</td>
<td>152.6079</td>
<td>154.9732</td>
<td>158.918</td>
<td>163.2904</td>
<td>167.6519</td>
<td>171.5684</td>
<td>173.9083</td>
<td>175.4264</td>
</tr>
<tr>
<th scope="row">233.5</th>
<td>151.0762</td>
<td>152.6143</td>
<td>154.9799</td>
<td>158.9251</td>
<td>163.2976</td>
<td>167.6589</td>
<td>171.5751</td>
<td>173.9147</td>
<td>175.4325</td>
</tr>
<tr>
<th scope="row">234.5</th>
<td>151.0821</td>
<td>152.6205</td>
<td>154.9864</td>
<td>158.9319</td>
<td>163.3045</td>
<td>167.6657</td>
<td>171.5815</td>
<td>173.9208</td>
<td>175.4384</td>
</tr>
<tr>
<th scope="row">235.5</th>
<td>151.0879</td>
<td>152.6265</td>
<td>154.9926</td>
<td>158.9384</td>
<td>163.3111</td>
<td>167.6722</td>
<td>171.5877</td>
<td>173.9267</td>
<td>175.4441</td>
</tr>
<tr>
<th scope="row">236.5</th>
<td>151.0934</td>
<td>152.6322</td>
<td>154.9986</td>
<td>158.9447</td>
<td>163.3175</td>
<td>167.6785</td>
<td>171.5937</td>
<td>173.9324</td>
<td>175.4496</td>
</tr>
<tr>
<th scope="row">237.5</th>
<td>151.0987</td>
<td>152.6377</td>
<td>155.0044</td>
<td>158.9508</td>
<td>163.3237</td>
<td>167.6845</td>
<td>171.5994</td>
<td>173.9379</td>
<td>175.4548</td>
</tr>
<tr>
<th scope="row">238.5</th>
<td>151.1038</td>
<td>152.6431</td>
<td>155.01</td>
<td>158.9567</td>
<td>163.3297</td>
<td>167.6904</td>
<td>171.6049</td>
<td>173.9432</td>
<td>175.4599</td>
</tr>
<tr>
<th scope="row">239.5</th>
<td>151.1088</td>
<td>152.6482</td>
<td>155.0154</td>
<td>158.9624</td>
<td>163.3354</td>
<td>167.696</td>
<td>171.6103</td>
<td>173.9482</td>
<td>175.4648</td>
</tr>
<tr>
<th scope="row">240</th>
<td>151.1112</td>
<td>152.6507</td>
<td>155.0181</td>
<td>158.9651</td>
<td>163.3383</td>
<td>167.6987</td>
<td>171.6129</td>
<td>173.9507</td>
<td>175.4671</td>
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

