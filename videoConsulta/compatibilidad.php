<?php
// si el sistema es antiguo colocar este archivo como include en cada archivo de vista de modulosMasivos
?>

<?php
// -------------------------------------- ඞ
// 22 06 2023 - JRodriguez
// funciones para encriptado fácil 
function salt()
{
  $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $longitud = strlen($caracteres);
  $resultado = '';
  for ($i = 0; $i < 10; $i++) {
    $pos = rand(0, $longitud - 1);
    $resultado .= $caracteres[$pos];
  }
  return $resultado;
}

function decrypt($dato)
{
  // el dato tiene 10 caracteres de basura y luego la clave en base64
  return base64_decode(substr($dato, 10, strlen($dato)));
}

function encrypt($dato)
{
  return salt() . base64_encode($dato);
}
// -------------------------------------- ඞ
?>


<style>
  
.small-box {
  border-radius: 0.25rem;
  box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
  display: block;
  margin-bottom: 20px;
  position: relative;
}

.small-box > .inner {
  padding: 10px;
}

.small-box > .small-box-footer {
  background-color: rgba(0, 0, 0, 0.1);
  color: rgba(255, 255, 255, 0.8);
  display: block;
  padding: 3px 0;
  position: relative;
  text-align: center;
  text-decoration: none;
  z-index: 10;
}

.small-box > .small-box-footer:hover {
  background-color: rgba(0, 0, 0, 0.15);
  color: #fff;
}

.small-box h3 {
  font-size: 2.2rem;
  font-weight: 700;
  margin: 0 0 10px;
  padding: 0;
  white-space: nowrap;
}

@media (min-width: 992px) {
  .col-xl-2 .small-box h3,
  .col-lg-2 .small-box h3,
  .col-md-2 .small-box h3 {
    font-size: 1.6rem;
  }
  .col-xl-3 .small-box h3,
  .col-lg-3 .small-box h3,
  .col-md-3 .small-box h3 {
    font-size: 1.6rem;
  }
}

@media (min-width: 1200px) {
  .col-xl-2 .small-box h3,
  .col-lg-2 .small-box h3,
  .col-md-2 .small-box h3 {
    font-size: 2.2rem;
  }
  .col-xl-3 .small-box h3,
  .col-lg-3 .small-box h3,
  .col-md-3 .small-box h3 {
    font-size: 2.2rem;
  }
}

.small-box p {
  font-size: 1rem;
}

.small-box p > small {
  color: #f8f9fa;
  display: block;
  font-size: .9rem;
  margin-top: 5px;
}

.small-box h3,
.small-box p {
  z-index: 5;
}

.small-box .icon {
  color: rgba(0, 0, 0, 0.15);
  z-index: 0;
}


.alert .icon {
  margin-right: 10px;
}
.small-box .icon > i {
  font-size: 90px;
  position: absolute;
  right: 15px;
  top: 15px;
  transition: -webkit-transform 0.3s linear;
  transition: transform 0.3s linear;
  transition: transform 0.3s linear, -webkit-transform 0.3s linear;
}

.small-box .icon > i.fa, .small-box .icon > i.fas, .small-box .icon > i.far, .small-box .icon > i.fab, .small-box .icon > i.fal, .small-box .icon > i.fad, .small-box .icon > i.ion {
  font-size: 70px;
  top: 20px;
}

.small-box .icon svg {
  font-size: 70px;
  position: absolute;
  right: 15px;
  top: 15px;
  transition: -webkit-transform 0.3s linear;
  transition: transform 0.3s linear;
  transition: transform 0.3s linear, -webkit-transform 0.3s linear;
}

.small-box:hover {
  text-decoration: none;
}

.small-box:hover .icon > i, .small-box:hover .icon > i.fa, .small-box:hover .icon > i.fas, .small-box:hover .icon > i.far, .small-box:hover .icon > i.fab, .small-box:hover .icon > i.fal, .small-box:hover .icon > i.fad, .small-box:hover .icon > i.ion {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

.small-box:hover .icon > svg {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

@media (max-width: 767.98px) {
  .small-box {
    text-align: center;
  }
  .small-box .icon {
    display: none;
  }
  .small-box p {
    font-size: 12px;
  }
}

  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
    z-index: 99999;
  }

  .card>hr {
    margin-right: 0;
    margin-left: 0;
  }

  .card>.list-group {
    border-top: inherit;
    border-bottom: inherit;
  }

  .card>.list-group:first-child {
    border-top-width: 0;
    border-top-left-radius: calc(0.25rem - 0);
    border-top-right-radius: calc(0.25rem - 0);
  }

  .card>.list-group:last-child {
    border-bottom-width: 0;
    border-bottom-right-radius: calc(0.25rem - 0);
    border-bottom-left-radius: calc(0.25rem - 0);
  }

  .card>.card-header+.list-group,
  .card>.list-group+.card-footer {
    border-top: 0;
  }

  .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
  }

  .card-title {
    margin-bottom: 0.75rem;
  }

  .card-subtitle {
    margin-top: -0.375rem;
    margin-bottom: 0;
  }

  .card-text:last-child {
    margin-bottom: 0;
  }

  .card-link:hover {
    text-decoration: none;
  }

  .card-link+.card-link {
    margin-left: 1.25rem;
  }

  .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0.03);
    border-bottom: 0 solid rgba(0, 0, 0, 0.125);
  }

  .card-header:first-child {
    border-radius: calc(0.25rem - 0) calc(0.25rem - 0) 0 0;
  }

  .card-footer {
    padding: 0.75rem 1.25rem;
    background-color: rgba(0, 0, 0, 0.03);
    border-top: 0 solid rgba(0, 0, 0, 0.125);
  }

  .card-footer:last-child {
    border-radius: 0 0 calc(0.25rem - 0) calc(0.25rem - 0);
  }

  .card-header-tabs {
    margin-right: -0.625rem;
    margin-bottom: -0.75rem;
    margin-left: -0.625rem;
    border-bottom: 0;
  }

  .card-header-pills {
    margin-right: -0.625rem;
    margin-left: -0.625rem;
  }

  .card-img-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1.25rem;
    border-radius: calc(0.25rem - 0);
  }

  .card-img,
  .card-img-top,
  .card-img-bottom {
    -ms-flex-negative: 0;
    flex-shrink: 0;
    width: 100%;
  }

  .card-img,
  .card-img-top {
    border-top-left-radius: calc(0.25rem - 0);
    border-top-right-radius: calc(0.25rem - 0);
  }

  .card-img,
  .card-img-bottom {
    border-bottom-right-radius: calc(0.25rem - 0);
    border-bottom-left-radius: calc(0.25rem - 0);
  }

  .card-deck .card {
    margin-bottom: 7.5px;
  }

  @media (min-width: 576px) {
    .card-deck {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-flow: row wrap;
      flex-flow: row wrap;
      margin-right: -7.5px;
      margin-left: -7.5px;
    }

    .card-deck .card {
      -ms-flex: 1 0 0%;
      flex: 1 0 0%;
      margin-right: 7.5px;
      margin-bottom: 0;
      margin-left: 7.5px;
    }
  }

  .card-group>.card {
    margin-bottom: 7.5px;
  }

  @media (min-width: 576px) {
    .card-group {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-flow: row wrap;
      flex-flow: row wrap;
    }

    .card-group>.card {
      -ms-flex: 1 0 0%;
      flex: 1 0 0%;
      margin-bottom: 0;
    }

    .card-group>.card+.card {
      margin-left: 0;
      border-left: 0;
    }

    .card-group>.card:not(:last-child) {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }

    .card-group>.card:not(:last-child) .card-img-top,
    .card-group>.card:not(:last-child) .card-header {
      border-top-right-radius: 0;
    }

    .card-group>.card:not(:last-child) .card-img-bottom,
    .card-group>.card:not(:last-child) .card-footer {
      border-bottom-right-radius: 0;
    }

    .card-group>.card:not(:first-child) {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }

    .card-group>.card:not(:first-child) .card-img-top,
    .card-group>.card:not(:first-child) .card-header {
      border-top-left-radius: 0;
    }

    .card-group>.card:not(:first-child) .card-img-bottom,
    .card-group>.card:not(:first-child) .card-footer {
      border-bottom-left-radius: 0;
    }
  }

  .card-columns .card {
    margin-bottom: 0.75rem;
  }

  @media (min-width: 576px) {
    .card-columns {
      -webkit-column-count: 3;
      -moz-column-count: 3;
      column-count: 3;
      -webkit-column-gap: 1.25rem;
      -moz-column-gap: 1.25rem;
      column-gap: 1.25rem;
      orphans: 1;
      widows: 1;
    }

    .card-columns .card {
      display: inline-block;
      width: 100%;
    }
  }

  .accordion {
    overflow-anchor: none;
  }

  .accordion>.card {
    overflow: hidden;
  }

  .accordion>.card:not(:last-of-type) {
    border-bottom: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }

  .accordion>.card:not(:first-of-type) {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

  .accordion>.card>.card-header {
    border-radius: 0;
    margin-bottom: 0;
  }

  .card-primary:not(.card-outline)>.card-header {
    background-color: #007bff;
  }

  .card-primary:not(.card-outline)>.card-header,
  .card-primary:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-primary:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-primary.card-outline {
    border-top: 3px solid #007bff;
  }

  .card-primary.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-primary.card-outline-tabs>.card-header a.active,
  .card-primary.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #007bff;
  }

  .bg-primary>.card-header .btn-tool,
  .bg-gradient-primary>.card-header .btn-tool,
  .card-primary:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-primary>.card-header .btn-tool:hover,
  .bg-gradient-primary>.card-header .btn-tool:hover,
  .card-primary:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-primary .bootstrap-datetimepicker-widget .table td,
  .card.bg-primary .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-primary .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-primary .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-primary .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-primary .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-primary .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #0067d6;
    color: #fff;
  }

  .card.bg-primary .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-primary .bootstrap-datetimepicker-widget table td.active,
  .card.bg-primary .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-primary .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #3395ff;
    color: #fff;
  }

  .card-secondary:not(.card-outline)>.card-header {
    background-color: #6c757d;
  }

  .card-secondary:not(.card-outline)>.card-header,
  .card-secondary:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-secondary:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-secondary.card-outline {
    border-top: 3px solid #6c757d;
  }

  .card-secondary.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-secondary.card-outline-tabs>.card-header a.active,
  .card-secondary.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #6c757d;
  }

  .bg-secondary>.card-header .btn-tool,
  .bg-gradient-secondary>.card-header .btn-tool,
  .card-secondary:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-secondary>.card-header .btn-tool:hover,
  .bg-gradient-secondary>.card-header .btn-tool:hover,
  .card-secondary:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-secondary .bootstrap-datetimepicker-widget .table td,
  .card.bg-secondary .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-secondary .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-secondary .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-secondary .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-secondary .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-secondary .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #596167;
    color: #fff;
  }

  .card.bg-secondary .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-secondary .bootstrap-datetimepicker-widget table td.active,
  .card.bg-secondary .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-secondary .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #868e96;
    color: #fff;
  }

  .card-success:not(.card-outline)>.card-header {
    background-color: #28a745;
  }

  .card-success:not(.card-outline)>.card-header,
  .card-success:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-success:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-success.card-outline {
    border-top: 3px solid #28a745;
  }

  .card-success.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-success.card-outline-tabs>.card-header a.active,
  .card-success.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #28a745;
  }

  .bg-success>.card-header .btn-tool,
  .bg-gradient-success>.card-header .btn-tool,
  .card-success:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-success>.card-header .btn-tool:hover,
  .bg-gradient-success>.card-header .btn-tool:hover,
  .card-success:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-success .bootstrap-datetimepicker-widget .table td,
  .card.bg-success .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-success .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-success .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-success .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-success .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-success .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #208637;
    color: #fff;
  }

  .card.bg-success .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-success .bootstrap-datetimepicker-widget table td.active,
  .card.bg-success .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-success .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #34ce57;
    color: #fff;
  }

  .card-info:not(.card-outline)>.card-header {
    background-color: #17a2b8;
  }

  .card-info:not(.card-outline)>.card-header,
  .card-info:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-info:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-info.card-outline {
    border-top: 3px solid #17a2b8;
  }

  .card-info.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-info.card-outline-tabs>.card-header a.active,
  .card-info.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #17a2b8;
  }

  .bg-info>.card-header .btn-tool,
  .bg-gradient-info>.card-header .btn-tool,
  .card-info:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-info>.card-header .btn-tool:hover,
  .bg-gradient-info>.card-header .btn-tool:hover,
  .card-info:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-info .bootstrap-datetimepicker-widget .table td,
  .card.bg-info .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-info .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-info .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-info .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-info .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-info .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #128294;
    color: #fff;
  }

  .card.bg-info .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-info .bootstrap-datetimepicker-widget table td.active,
  .card.bg-info .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-info .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #1fc8e3;
    color: #fff;
  }

  .card-warning:not(.card-outline)>.card-header {
    background-color: #ffc107;
  }

  .card-warning:not(.card-outline)>.card-header,
  .card-warning:not(.card-outline)>.card-header a {
    color: #1f2d3d;
  }

  .card-warning:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-warning.card-outline {
    border-top: 3px solid #ffc107;
  }

  .card-warning.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-warning.card-outline-tabs>.card-header a.active,
  .card-warning.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #ffc107;
  }

  .bg-warning>.card-header .btn-tool,
  .bg-gradient-warning>.card-header .btn-tool,
  .card-warning:not(.card-outline)>.card-header .btn-tool {
    color: rgba(31, 45, 61, 0.8);
  }

  .bg-warning>.card-header .btn-tool:hover,
  .bg-gradient-warning>.card-header .btn-tool:hover,
  .card-warning:not(.card-outline)>.card-header .btn-tool:hover {
    color: #1f2d3d;
  }

  .card.bg-warning .bootstrap-datetimepicker-widget .table td,
  .card.bg-warning .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-warning .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-warning .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-warning .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-warning .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-warning .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #dda600;
    color: #1f2d3d;
  }

  .card.bg-warning .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #1f2d3d;
  }

  .card.bg-warning .bootstrap-datetimepicker-widget table td.active,
  .card.bg-warning .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-warning .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #ffce3a;
    color: #1f2d3d;
  }

  .card-danger:not(.card-outline)>.card-header {
    background-color: #dc3545;
  }

  .card-danger:not(.card-outline)>.card-header,
  .card-danger:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-danger:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-danger.card-outline {
    border-top: 3px solid #dc3545;
  }

  .card-danger.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-danger.card-outline-tabs>.card-header a.active,
  .card-danger.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #dc3545;
  }

  .bg-danger>.card-header .btn-tool,
  .bg-gradient-danger>.card-header .btn-tool,
  .card-danger:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-danger>.card-header .btn-tool:hover,
  .bg-gradient-danger>.card-header .btn-tool:hover,
  .card-danger:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-danger .bootstrap-datetimepicker-widget .table td,
  .card.bg-danger .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-danger .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-danger .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-danger .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-danger .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-danger .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #c62232;
    color: #fff;
  }

  .card.bg-danger .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-danger .bootstrap-datetimepicker-widget table td.active,
  .card.bg-danger .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-danger .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #e4606d;
    color: #fff;
  }

  .card-light:not(.card-outline)>.card-header {
    background-color: #f8f9fa;
  }

  .card-light:not(.card-outline)>.card-header,
  .card-light:not(.card-outline)>.card-header a {
    color: #1f2d3d;
  }

  .card-light:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-light.card-outline {
    border-top: 3px solid #f8f9fa;
  }

  .card-light.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-light.card-outline-tabs>.card-header a.active,
  .card-light.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #f8f9fa;
  }


  .bg-light {
  background-color: #f8f9fa !important;
}

a.bg-light:hover, a.bg-light:focus,
button.bg-light:hover,
button.bg-light:focus {
  background-color: #dae0e5 !important;
}

  .bg-light>.card-header .btn-tool,
  .bg-gradient-light>.card-header .btn-tool,
  .card-light:not(.card-outline)>.card-header .btn-tool {
    color: rgba(31, 45, 61, 0.8);
  }

  .bg-light>.card-header .btn-tool:hover,
  .bg-gradient-light>.card-header .btn-tool:hover,
  .card-light:not(.card-outline)>.card-header .btn-tool:hover {
    color: #1f2d3d;
  }

  .card.bg-light .bootstrap-datetimepicker-widget .table td,
  .card.bg-light .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-light .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-light .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-light .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-light .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-light .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #e0e5e9;
    color: #1f2d3d;
  }

  .card.bg-light .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #1f2d3d;
  }

  .card.bg-light .bootstrap-datetimepicker-widget table td.active,
  .card.bg-light .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-light .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: white;
    color: #1f2d3d;
  }

  .card-dark:not(.card-outline)>.card-header {
    background-color: #343a40;
  }

  .card-dark:not(.card-outline)>.card-header,
  .card-dark:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-dark:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-dark.card-outline {
    border-top: 3px solid #343a40;
  }

  .card-dark.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-dark.card-outline-tabs>.card-header a.active,
  .card-dark.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #343a40;
  }

  .bg-dark>.card-header .btn-tool,
  .bg-gradient-dark>.card-header .btn-tool,
  .card-dark:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-dark>.card-header .btn-tool:hover,
  .bg-gradient-dark>.card-header .btn-tool:hover,
  .card-dark:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-dark .bootstrap-datetimepicker-widget .table td,
  .card.bg-dark .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-dark .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-dark .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-dark .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-dark .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-dark .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #222629;
    color: #fff;
  }

  .card.bg-dark .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-dark .bootstrap-datetimepicker-widget table td.active,
  .card.bg-dark .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-dark .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #4b545c;
    color: #fff;
  }

  .card-lightblue:not(.card-outline)>.card-header {
    background-color: #3c8dbc;
  }

  .card-lightblue:not(.card-outline)>.card-header,
  .card-lightblue:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-lightblue:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-lightblue.card-outline {
    border-top: 3px solid #3c8dbc;
  }

  .card-lightblue.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-lightblue.card-outline-tabs>.card-header a.active,
  .card-lightblue.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #3c8dbc;
  }

  .bg-lightblue>.card-header .btn-tool,
  .bg-gradient-lightblue>.card-header .btn-tool,
  .card-lightblue:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-lightblue>.card-header .btn-tool:hover,
  .bg-gradient-lightblue>.card-header .btn-tool:hover,
  .card-lightblue:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-lightblue .bootstrap-datetimepicker-widget .table td,
  .card.bg-lightblue .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-lightblue .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-lightblue .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-lightblue .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-lightblue .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-lightblue .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #32769d;
    color: #fff;
  }

  .card.bg-lightblue .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-lightblue .bootstrap-datetimepicker-widget table td.active,
  .card.bg-lightblue .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-lightblue .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #5fa4cc;
    color: #fff;
  }

  .card-navy:not(.card-outline)>.card-header {
    background-color: #001f3f;
  }

  .card-navy:not(.card-outline)>.card-header,
  .card-navy:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-navy:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-navy.card-outline {
    border-top: 3px solid #001f3f;
  }

  .card-navy.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-navy.card-outline-tabs>.card-header a.active,
  .card-navy.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #001f3f;
  }

  .bg-navy>.card-header .btn-tool,
  .bg-gradient-navy>.card-header .btn-tool,
  .card-navy:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-navy>.card-header .btn-tool:hover,
  .bg-gradient-navy>.card-header .btn-tool:hover,
  .card-navy:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-navy .bootstrap-datetimepicker-widget .table td,
  .card.bg-navy .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-navy .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-navy .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-navy .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-navy .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-navy .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #000b16;
    color: #fff;
  }

  .card.bg-navy .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-navy .bootstrap-datetimepicker-widget table td.active,
  .card.bg-navy .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-navy .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #003872;
    color: #fff;
  }

  .card-olive:not(.card-outline)>.card-header {
    background-color: #3d9970;
  }

  .card-olive:not(.card-outline)>.card-header,
  .card-olive:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-olive:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-olive.card-outline {
    border-top: 3px solid #3d9970;
  }

  .card-olive.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-olive.card-outline-tabs>.card-header a.active,
  .card-olive.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #3d9970;
  }

  .bg-olive>.card-header .btn-tool,
  .bg-gradient-olive>.card-header .btn-tool,
  .card-olive:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-olive>.card-header .btn-tool:hover,
  .bg-gradient-olive>.card-header .btn-tool:hover,
  .card-olive:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-olive .bootstrap-datetimepicker-widget .table td,
  .card.bg-olive .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-olive .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-olive .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-olive .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-olive .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-olive .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #317c5b;
    color: #fff;
  }

  .card.bg-olive .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-olive .bootstrap-datetimepicker-widget table td.active,
  .card.bg-olive .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-olive .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #50b98a;
    color: #fff;
  }

  .card-lime:not(.card-outline)>.card-header {
    background-color: #01ff70;
  }

  .card-lime:not(.card-outline)>.card-header,
  .card-lime:not(.card-outline)>.card-header a {
    color: #1f2d3d;
  }

  .card-lime:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-lime.card-outline {
    border-top: 3px solid #01ff70;
  }

  .card-lime.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-lime.card-outline-tabs>.card-header a.active,
  .card-lime.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #01ff70;
  }

  .bg-lime>.card-header .btn-tool,
  .bg-gradient-lime>.card-header .btn-tool,
  .card-lime:not(.card-outline)>.card-header .btn-tool {
    color: rgba(31, 45, 61, 0.8);
  }

  .bg-lime>.card-header .btn-tool:hover,
  .bg-gradient-lime>.card-header .btn-tool:hover,
  .card-lime:not(.card-outline)>.card-header .btn-tool:hover {
    color: #1f2d3d;
  }

  .card.bg-lime .bootstrap-datetimepicker-widget .table td,
  .card.bg-lime .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-lime .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-lime .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-lime .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-lime .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-lime .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #00d75e;
    color: #1f2d3d;
  }

  .card.bg-lime .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #1f2d3d;
  }

  .card.bg-lime .bootstrap-datetimepicker-widget table td.active,
  .card.bg-lime .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-lime .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #34ff8d;
    color: #1f2d3d;
  }

  .card-fuchsia:not(.card-outline)>.card-header {
    background-color: #f012be;
  }

  .card-fuchsia:not(.card-outline)>.card-header,
  .card-fuchsia:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-fuchsia:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-fuchsia.card-outline {
    border-top: 3px solid #f012be;
  }

  .card-fuchsia.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-fuchsia.card-outline-tabs>.card-header a.active,
  .card-fuchsia.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #f012be;
  }

  .bg-fuchsia>.card-header .btn-tool,
  .bg-gradient-fuchsia>.card-header .btn-tool,
  .card-fuchsia:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-fuchsia>.card-header .btn-tool:hover,
  .bg-gradient-fuchsia>.card-header .btn-tool:hover,
  .card-fuchsia:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-fuchsia .bootstrap-datetimepicker-widget .table td,
  .card.bg-fuchsia .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-fuchsia .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-fuchsia .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-fuchsia .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-fuchsia .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-fuchsia .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #cc0da1;
    color: #fff;
  }

  .card.bg-fuchsia .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-fuchsia .bootstrap-datetimepicker-widget table td.active,
  .card.bg-fuchsia .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-fuchsia .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #f342cb;
    color: #fff;
  }

  .card-maroon:not(.card-outline)>.card-header {
    background-color: #d81b60;
  }

  .card-maroon:not(.card-outline)>.card-header,
  .card-maroon:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-maroon:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-maroon.card-outline {
    border-top: 3px solid #d81b60;
  }

  .card-maroon.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-maroon.card-outline-tabs>.card-header a.active,
  .card-maroon.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #d81b60;
  }

  .bg-maroon>.card-header .btn-tool,
  .bg-gradient-maroon>.card-header .btn-tool,
  .card-maroon:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-maroon>.card-header .btn-tool:hover,
  .bg-gradient-maroon>.card-header .btn-tool:hover,
  .card-maroon:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-maroon .bootstrap-datetimepicker-widget .table td,
  .card.bg-maroon .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-maroon .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-maroon .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-maroon .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-maroon .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-maroon .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #b41650;
    color: #fff;
  }

  .card.bg-maroon .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-maroon .bootstrap-datetimepicker-widget table td.active,
  .card.bg-maroon .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-maroon .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #e73f7c;
    color: #fff;
  }

  .card-blue:not(.card-outline)>.card-header {
    background-color: #007bff;
  }

  .card-blue:not(.card-outline)>.card-header,
  .card-blue:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-blue:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-blue.card-outline {
    border-top: 3px solid #007bff;
  }

  .card-blue.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-blue.card-outline-tabs>.card-header a.active,
  .card-blue.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #007bff;
  }

  .bg-blue>.card-header .btn-tool,
  .bg-gradient-blue>.card-header .btn-tool,
  .card-blue:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-blue>.card-header .btn-tool:hover,
  .bg-gradient-blue>.card-header .btn-tool:hover,
  .card-blue:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-blue .bootstrap-datetimepicker-widget .table td,
  .card.bg-blue .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-blue .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-blue .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-blue .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-blue .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-blue .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #0067d6;
    color: #fff;
  }

  .card.bg-blue .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-blue .bootstrap-datetimepicker-widget table td.active,
  .card.bg-blue .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-blue .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #3395ff;
    color: #fff;
  }

  .card-indigo:not(.card-outline)>.card-header {
    background-color: #6610f2;
  }

  .card-indigo:not(.card-outline)>.card-header,
  .card-indigo:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-indigo:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-indigo.card-outline {
    border-top: 3px solid #6610f2;
  }

  .card-indigo.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-indigo.card-outline-tabs>.card-header a.active,
  .card-indigo.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #6610f2;
  }

  .bg-indigo>.card-header .btn-tool,
  .bg-gradient-indigo>.card-header .btn-tool,
  .card-indigo:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-indigo>.card-header .btn-tool:hover,
  .bg-gradient-indigo>.card-header .btn-tool:hover,
  .card-indigo:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-indigo .bootstrap-datetimepicker-widget .table td,
  .card.bg-indigo .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-indigo .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-indigo .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-indigo .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-indigo .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-indigo .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #550bce;
    color: #fff;
  }

  .card.bg-indigo .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-indigo .bootstrap-datetimepicker-widget table td.active,
  .card.bg-indigo .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-indigo .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #8540f5;
    color: #fff;
  }

  .card-purple:not(.card-outline)>.card-header {
    background-color: #6f42c1;
  }

  .card-purple:not(.card-outline)>.card-header,
  .card-purple:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-purple:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-purple.card-outline {
    border-top: 3px solid #6f42c1;
  }

  .card-purple.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-purple.card-outline-tabs>.card-header a.active,
  .card-purple.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #6f42c1;
  }

  .bg-purple>.card-header .btn-tool,
  .bg-gradient-purple>.card-header .btn-tool,
  .card-purple:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-purple>.card-header .btn-tool:hover,
  .bg-gradient-purple>.card-header .btn-tool:hover,
  .card-purple:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-purple .bootstrap-datetimepicker-widget .table td,
  .card.bg-purple .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-purple .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-purple .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-purple .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-purple .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-purple .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #5d36a4;
    color: #fff;
  }

  .card.bg-purple .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-purple .bootstrap-datetimepicker-widget table td.active,
  .card.bg-purple .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-purple .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #8c68ce;
    color: #fff;
  }

  .card-pink:not(.card-outline)>.card-header {
    background-color: #e83e8c;
  }

  .card-pink:not(.card-outline)>.card-header,
  .card-pink:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-pink:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-pink.card-outline {
    border-top: 3px solid #e83e8c;
  }

  .card-pink.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-pink.card-outline-tabs>.card-header a.active,
  .card-pink.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #e83e8c;
  }

  .bg-pink>.card-header .btn-tool,
  .bg-gradient-pink>.card-header .btn-tool,
  .card-pink:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-pink>.card-header .btn-tool:hover,
  .bg-gradient-pink>.card-header .btn-tool:hover,
  .card-pink:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-pink .bootstrap-datetimepicker-widget .table td,
  .card.bg-pink .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-pink .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-pink .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-pink .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-pink .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-pink .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #e21b76;
    color: #fff;
  }

  .card.bg-pink .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-pink .bootstrap-datetimepicker-widget table td.active,
  .card.bg-pink .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-pink .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #ed6ca7;
    color: #fff;
  }

  .card-red:not(.card-outline)>.card-header {
    background-color: #dc3545;
  }

  .card-red:not(.card-outline)>.card-header,
  .card-red:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-red:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-red.card-outline {
    border-top: 3px solid #dc3545;
  }

  .card-red.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-red.card-outline-tabs>.card-header a.active,
  .card-red.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #dc3545;
  }

  .bg-red>.card-header .btn-tool,
  .bg-gradient-red>.card-header .btn-tool,
  .card-red:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-red>.card-header .btn-tool:hover,
  .bg-gradient-red>.card-header .btn-tool:hover,
  .card-red:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-red .bootstrap-datetimepicker-widget .table td,
  .card.bg-red .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-red .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-red .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-red .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-red .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-red .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #c62232;
    color: #fff;
  }

  .card.bg-red .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-red .bootstrap-datetimepicker-widget table td.active,
  .card.bg-red .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-red .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #e4606d;
    color: #fff;
  }

  .card-orange:not(.card-outline)>.card-header {
    background-color: #fd7e14;
  }

  .card-orange:not(.card-outline)>.card-header,
  .card-orange:not(.card-outline)>.card-header a {
    color: #1f2d3d;
  }

  .card-orange:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-orange.card-outline {
    border-top: 3px solid #fd7e14;
  }

  .card-orange.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-orange.card-outline-tabs>.card-header a.active,
  .card-orange.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #fd7e14;
  }

  .bg-orange>.card-header .btn-tool,
  .bg-gradient-orange>.card-header .btn-tool,
  .card-orange:not(.card-outline)>.card-header .btn-tool {
    color: rgba(31, 45, 61, 0.8);
  }

  .bg-orange>.card-header .btn-tool:hover,
  .bg-gradient-orange>.card-header .btn-tool:hover,
  .card-orange:not(.card-outline)>.card-header .btn-tool:hover {
    color: #1f2d3d;
  }

  .card.bg-orange .bootstrap-datetimepicker-widget .table td,
  .card.bg-orange .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-orange .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-orange .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-orange .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-orange .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-orange .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #e66a02;
    color: #1f2d3d;
  }

  .card.bg-orange .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #1f2d3d;
  }

  .card.bg-orange .bootstrap-datetimepicker-widget table td.active,
  .card.bg-orange .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-orange .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #fd9a47;
    color: #1f2d3d;
  }

  .card-yellow:not(.card-outline)>.card-header {
    background-color: #ffc107;
  }

  .card-yellow:not(.card-outline)>.card-header,
  .card-yellow:not(.card-outline)>.card-header a {
    color: #1f2d3d;
  }

  .card-yellow:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-yellow.card-outline {
    border-top: 3px solid #ffc107;
  }

  .card-yellow.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-yellow.card-outline-tabs>.card-header a.active,
  .card-yellow.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #ffc107;
  }

  .bg-yellow>.card-header .btn-tool,
  .bg-gradient-yellow>.card-header .btn-tool,
  .card-yellow:not(.card-outline)>.card-header .btn-tool {
    color: rgba(31, 45, 61, 0.8);
  }

  .bg-yellow>.card-header .btn-tool:hover,
  .bg-gradient-yellow>.card-header .btn-tool:hover,
  .card-yellow:not(.card-outline)>.card-header .btn-tool:hover {
    color: #1f2d3d;
  }

  .card.bg-yellow .bootstrap-datetimepicker-widget .table td,
  .card.bg-yellow .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-yellow .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-yellow .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-yellow .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-yellow .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-yellow .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #dda600;
    color: #1f2d3d;
  }

  .card.bg-yellow .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #1f2d3d;
  }

  .card.bg-yellow .bootstrap-datetimepicker-widget table td.active,
  .card.bg-yellow .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-yellow .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #ffce3a;
    color: #1f2d3d;
  }

  .card-green:not(.card-outline)>.card-header {
    background-color: #28a745;
  }

  .card-green:not(.card-outline)>.card-header,
  .card-green:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-green:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-green.card-outline {
    border-top: 3px solid #28a745;
  }

  .card-green.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-green.card-outline-tabs>.card-header a.active,
  .card-green.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #28a745;
  }

  .bg-green>.card-header .btn-tool,
  .bg-gradient-green>.card-header .btn-tool,
  .card-green:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-green>.card-header .btn-tool:hover,
  .bg-gradient-green>.card-header .btn-tool:hover,
  .card-green:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-green .bootstrap-datetimepicker-widget .table td,
  .card.bg-green .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-green .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-green .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-green .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-green .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-green .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #208637;
    color: #fff;
  }

  .card.bg-green .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-green .bootstrap-datetimepicker-widget table td.active,
  .card.bg-green .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-green .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #34ce57;
    color: #fff;
  }

  .card-teal:not(.card-outline)>.card-header {
    background-color: #20c997;
  }

  .card-teal:not(.card-outline)>.card-header,
  .card-teal:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-teal:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-teal.card-outline {
    border-top: 3px solid #20c997;
  }

  .card-teal.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-teal.card-outline-tabs>.card-header a.active,
  .card-teal.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #20c997;
  }

  .bg-teal>.card-header .btn-tool,
  .bg-gradient-teal>.card-header .btn-tool,
  .card-teal:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-teal>.card-header .btn-tool:hover,
  .bg-gradient-teal>.card-header .btn-tool:hover,
  .card-teal:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-teal .bootstrap-datetimepicker-widget .table td,
  .card.bg-teal .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-teal .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-teal .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-teal .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-teal .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-teal .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #1aa67d;
    color: #fff;
  }

  .card.bg-teal .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-teal .bootstrap-datetimepicker-widget table td.active,
  .card.bg-teal .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-teal .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #3ce0af;
    color: #fff;
  }

  .card-cyan:not(.card-outline)>.card-header {
    background-color: #17a2b8;
  }

  .card-cyan:not(.card-outline)>.card-header,
  .card-cyan:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-cyan:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-cyan.card-outline {
    border-top: 3px solid #17a2b8;
  }

  .card-cyan.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-cyan.card-outline-tabs>.card-header a.active,
  .card-cyan.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #17a2b8;
  }

  .bg-cyan>.card-header .btn-tool,
  .bg-gradient-cyan>.card-header .btn-tool,
  .card-cyan:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-cyan>.card-header .btn-tool:hover,
  .bg-gradient-cyan>.card-header .btn-tool:hover,
  .card-cyan:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-cyan .bootstrap-datetimepicker-widget .table td,
  .card.bg-cyan .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-cyan .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-cyan .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-cyan .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-cyan .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-cyan .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #128294;
    color: #fff;
  }

  .card.bg-cyan .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-cyan .bootstrap-datetimepicker-widget table td.active,
  .card.bg-cyan .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-cyan .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #1fc8e3;
    color: #fff;
  }

  .card-white:not(.card-outline)>.card-header {
    background-color: #fff;
  }

  .card-white:not(.card-outline)>.card-header,
  .card-white:not(.card-outline)>.card-header a {
    color: #1f2d3d;
  }

  .card-white:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-white.card-outline {
    border-top: 3px solid #fff;
  }

  .card-white.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-white.card-outline-tabs>.card-header a.active,
  .card-white.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #fff;
  }

  .bg-white>.card-header .btn-tool,
  .bg-gradient-white>.card-header .btn-tool,
  .card-white:not(.card-outline)>.card-header .btn-tool {
    color: rgba(31, 45, 61, 0.8);
  }

  .bg-white>.card-header .btn-tool:hover,
  .bg-gradient-white>.card-header .btn-tool:hover,
  .card-white:not(.card-outline)>.card-header .btn-tool:hover {
    color: #1f2d3d;
  }

  .card.bg-white .bootstrap-datetimepicker-widget .table td,
  .card.bg-white .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-white .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-white .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-white .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-white .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-white .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #ebebeb;
    color: #1f2d3d;
  }

  .card.bg-white .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #1f2d3d;
  }

  .card.bg-white .bootstrap-datetimepicker-widget table td.active,
  .card.bg-white .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-white .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: white;
    color: #1f2d3d;
  }

  .card-gray:not(.card-outline)>.card-header {
    background-color: #6c757d;
  }

  .card-gray:not(.card-outline)>.card-header,
  .card-gray:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-gray:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-gray.card-outline {
    border-top: 3px solid #6c757d;
  }

  .card-gray.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-gray.card-outline-tabs>.card-header a.active,
  .card-gray.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #6c757d;
  }

  .bg-gray>.card-header .btn-tool,
  .bg-gradient-gray>.card-header .btn-tool,
  .card-gray:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  
.direct-chat .card-body {
  overflow-x: hidden;
  padding: 0;
  position: relative;
}

.direct-chat.chat-pane-open .direct-chat-contacts {
  -webkit-transform: translate(0, 0);
  transform: translate(0, 0);
}

.direct-chat.timestamp-light .direct-chat-timestamp {
  color: #30465f;
}

.direct-chat.timestamp-dark .direct-chat-timestamp {
  color: #cccccc;
}

.direct-chat-messages {
  -webkit-transform: translate(0, 0);
  transform: translate(0, 0);
  height: 250px;
  overflow: auto;
  padding: 10px;
}

.direct-chat-msg,
.direct-chat-text {
  display: block;
}

.direct-chat-msg {
  margin-bottom: 10px;
}

.direct-chat-msg::after {
  display: block;
  clear: both;
  content: "";
}

.direct-chat-messages,
.direct-chat-contacts {
  transition: -webkit-transform .5s ease-in-out;
  transition: transform .5s ease-in-out;
  transition: transform .5s ease-in-out, -webkit-transform .5s ease-in-out;
}

.direct-chat-text {
  border-radius: 0.3rem;
  background-color: #d2d6de;
  border: 1px solid #d2d6de;
  color: #000;
  margin: 5px 0 0 50px;
  padding: 5px 10px;
  position: relative;
}

.direct-chat-text::after, .direct-chat-text::before {
  border: solid transparent;
  border-right-color: #d2d6de;
  content: " ";
  height: 0;
  pointer-events: none;
  position: absolute;
  right: 100%;
  top: 15px;
  width: 0;
}

.direct-chat-text::after {
  border-width: 5px;
  margin-top: -5px;
}

.direct-chat-text::before {
  border-width: 6px;
  margin-top: -6px;
}

.right .direct-chat-text {
  margin-left: 0;
  margin-right: 50px;
}

.right .direct-chat-text::after, .right .direct-chat-text::before {
  border-left-color: #d2d6de;
  border-right-color: transparent;
  left: 100%;
  right: auto;
}

.direct-chat-img {
  border-radius: 50%;
  float: left;
  height: 40px;
  width: 40px;
}

.right .direct-chat-img {
  float: right;
}

.direct-chat-infos {
  display: block;
  font-size: 0.875rem;
  margin-bottom: 2px;
}

.direct-chat-name {
  font-weight: 600;
}

.direct-chat-timestamp {
  color: #697582;
}

.direct-chat-contacts-open .direct-chat-contacts {
  -webkit-transform: translate(0, 0);
  transform: translate(0, 0);
}

.direct-chat-contacts {
  -webkit-transform: translate(101%, 0);
  transform: translate(101%, 0);
  background-color: #343a40;
  bottom: 0;
  color: #fff;
  height: 250px;
  overflow: auto;
  position: absolute;
  top: 0;
  width: 100%;
}

.direct-chat-contacts-light {
  background-color: #f8f9fa;
}

.direct-chat-contacts-light .contacts-list-name {
  color: #495057;
}

.direct-chat-contacts-light .contacts-list-date {
  color: #6c757d;
}

.direct-chat-contacts-light .contacts-list-msg {
  color: #545b62;
}

.contacts-list {
  padding-left: 0;
  list-style: none;
}

.contacts-list > li {
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  margin: 0;
  padding: 10px;
}

.contacts-list > li::after {
  display: block;
  clear: both;
  content: "";
}

.contacts-list > li:last-of-type {
  border-bottom: 0;
}

.contacts-list-img {
  border-radius: 50%;
  float: left;
  width: 40px;
}

.contacts-list-info {
  color: #fff;
  margin-left: 45px;
}
.text-dark {
  color: #343a40 !important;
}

.nav-tabs {
  border-bottom: 1px solid #dee2e6;
}

.nav-tabs .nav-link {
  margin-bottom: -1px;
  background-color: #f8f9fa;
  border: 1px solid transparent;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem;
}

.nav-tabs .nav-link:hover {
  border-color: #e9ecef #e9ecef #dee2e6;
}

.nav-tabs .nav-link.active {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs .nav-link.disabled {
  color: #6c757d;
  background-color: #f8f9fa;
  border-color: transparent;
}

.nav-tabs .nav-link.disabled:hover {
  background-color: #f8f9fa;
  border-color: transparent;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.nav-tabs .dropdown-item.active,
.nav-tabs .dropdown-item:active {
  color: #fff;
  text-decoration: none;
  background-color: #007bff;
}

.nav-tabs .nav-link.disabled:hover,
.nav-tabs .dropdown-item.disabled:hover {
  background-color: transparent;
  border-color: transparent;
}

.nav-tabs .nav-link:focus,
.nav-tabs .dropdown-item:focus {
  outline: none;
  box-shadow: none;
}

.contacts-list-name,
.contacts-list-status {
  display: block;
}

.contacts-list-name {
  font-weight: 600;
}

.contacts-list-status {
  font-size: 0.875rem;
}

.contacts-list-date {
  color: #ced4da;
  font-weight: 400;
}

.contacts-list-msg {
  color: #b1bbc4;
}

.direct-chat-primary .right > .direct-chat-text {
  background-color: #007bff;
  border-color: #007bff;
  color: #000;
}

.direct-chat-primary .right > .direct-chat-text::after, .direct-chat-primary .right > .direct-chat-text::before {
  border-left-color: #007bff;
}

.direct-chat-secondary .right > .direct-chat-text {
  background-color: #6c757d;
  border-color: #6c757d;
  color: #fff;
}

.direct-chat-secondary .right > .direct-chat-text::after, .direct-chat-secondary .right > .direct-chat-text::before {
  border-left-color: #6c757d;
}

.direct-chat-success .right > .direct-chat-text {
  background-color: #28a745;
  border-color: #28a745;
  color: #fff;
}

.direct-chat-success .right > .direct-chat-text::after, .direct-chat-success .right > .direct-chat-text::before {
  border-left-color: #28a745;
}

.direct-chat-info .right > .direct-chat-text {
  background-color: #17a2b8;
  border-color: #17a2b8;
  color: #fff;
}

.direct-chat-info .right > .direct-chat-text::after, .direct-chat-info .right > .direct-chat-text::before {
  border-left-color: #17a2b8;
}

.direct-chat-warning .right > .direct-chat-text {
  background-color: #ffc107;
  border-color: #ffc107;
  color: #1f2d3d;
}

.direct-chat-warning .right > .direct-chat-text::after, .direct-chat-warning .right > .direct-chat-text::before {
  border-left-color: #ffc107;
}

.direct-chat-danger .right > .direct-chat-text {
  background-color: #dc3545;
  border-color: #dc3545;
  color: #fff;
}

.direct-chat-danger .right > .direct-chat-text::after, .direct-chat-danger .right > .direct-chat-text::before {
  border-left-color: #dc3545;
}

.direct-chat-light .right > .direct-chat-text {
  background-color: #f8f9fa;
  border-color: #f8f9fa;
  color: #1f2d3d;
}

.direct-chat-light .right > .direct-chat-text::after, .direct-chat-light .right > .direct-chat-text::before {
  border-left-color: #f8f9fa;
}

.direct-chat-dark .right > .direct-chat-text {
  background-color: #343a40;
  border-color: #343a40;
  color: #fff;
}

.direct-chat-dark .right > .direct-chat-text::after, .direct-chat-dark .right > .direct-chat-text::before {
  border-left-color: #343a40;
}

.direct-chat-lightblue .right > .direct-chat-text {
  background-color: #3c8dbc;
  border-color: #3c8dbc;
  color: #fff;
}

.direct-chat-lightblue .right > .direct-chat-text::after, .direct-chat-lightblue .right > .direct-chat-text::before {
  border-left-color: #3c8dbc;
}

.direct-chat-navy .right > .direct-chat-text {
  background-color: #001f3f;
  border-color: #001f3f;
  color: #fff;
}

.direct-chat-navy .right > .direct-chat-text::after, .direct-chat-navy .right > .direct-chat-text::before {
  border-left-color: #001f3f;
}

.direct-chat-olive .right > .direct-chat-text {
  background-color: #3d9970;
  border-color: #3d9970;
  color: #fff;
}

.direct-chat-olive .right > .direct-chat-text::after, .direct-chat-olive .right > .direct-chat-text::before {
  border-left-color: #3d9970;
}

.direct-chat-lime .right > .direct-chat-text {
  background-color: #01ff70;
  border-color: #01ff70;
  color: #1f2d3d;
}

.direct-chat-lime .right > .direct-chat-text::after, .direct-chat-lime .right > .direct-chat-text::before {
  border-left-color: #01ff70;
}

.direct-chat-fuchsia .right > .direct-chat-text {
  background-color: #f012be;
  border-color: #f012be;
  color: #fff;
}

.direct-chat-fuchsia .right > .direct-chat-text::after, .direct-chat-fuchsia .right > .direct-chat-text::before {
  border-left-color: #f012be;
}

.direct-chat-maroon .right > .direct-chat-text {
  background-color: #d81b60;
  border-color: #d81b60;
  color: #fff;
}

.direct-chat-maroon .right > .direct-chat-text::after, .direct-chat-maroon .right > .direct-chat-text::before {
  border-left-color: #d81b60;
}

.direct-chat-blue .right > .direct-chat-text {
  background-color: #007bff;
  border-color: #007bff;
  color: #fff;
}

.direct-chat-blue .right > .direct-chat-text::after, .direct-chat-blue .right > .direct-chat-text::before {
  border-left-color: #007bff;
}

.direct-chat-indigo .right > .direct-chat-text {
  background-color: #6610f2;
  border-color: #6610f2;
  color: #fff;
}

.direct-chat-indigo .right > .direct-chat-text::after, .direct-chat-indigo .right > .direct-chat-text::before {
  border-left-color: #6610f2;
}

.direct-chat-purple .right > .direct-chat-text {
  background-color: #6f42c1;
  border-color: #6f42c1;
  color: #fff;
}

.direct-chat-purple .right > .direct-chat-text::after, .direct-chat-purple .right > .direct-chat-text::before {
  border-left-color: #6f42c1;
}

.direct-chat-pink .right > .direct-chat-text {
  background-color: #e83e8c;
  border-color: #e83e8c;
  color: #fff;
}

.direct-chat-pink .right > .direct-chat-text::after, .direct-chat-pink .right > .direct-chat-text::before {
  border-left-color: #e83e8c;
}

.direct-chat-red .right > .direct-chat-text {
  background-color: #dc3545;
  border-color: #dc3545;
  color: #fff;
}

.direct-chat-red .right > .direct-chat-text::after, .direct-chat-red .right > .direct-chat-text::before {
  border-left-color: #dc3545;
}

.direct-chat-orange .right > .direct-chat-text {
  background-color: #fd7e14;
  border-color: #fd7e14;
  color: #1f2d3d;
}

.direct-chat-orange .right > .direct-chat-text::after, .direct-chat-orange .right > .direct-chat-text::before {
  border-left-color: #fd7e14;
}

.direct-chat-yellow .right > .direct-chat-text {
  background-color: #ffc107;
  border-color: #ffc107;
  color: #1f2d3d;
}

.direct-chat-yellow .right > .direct-chat-text::after, .direct-chat-yellow .right > .direct-chat-text::before {
  border-left-color: #ffc107;
}

.direct-chat-green .right > .direct-chat-text {
  background-color: #28a745;
  border-color: #28a745;
  color: #fff;
}

.direct-chat-green .right > .direct-chat-text::after, .direct-chat-green .right > .direct-chat-text::before {
  border-left-color: #28a745;
}

.direct-chat-teal .right > .direct-chat-text {
  background-color: #20c997;
  border-color: #20c997;
  color: #fff;
}

.direct-chat-teal .right > .direct-chat-text::after, .direct-chat-teal .right > .direct-chat-text::before {
  border-left-color: #20c997;
}

.direct-chat-cyan .right > .direct-chat-text {
  background-color: #17a2b8;
  border-color: #17a2b8;
  color: #fff;
}

.direct-chat-cyan .right > .direct-chat-text::after, .direct-chat-cyan .right > .direct-chat-text::before {
  border-left-color: #17a2b8;
}

.direct-chat-white .right > .direct-chat-text {
  background-color: #fff;
  border-color: #fff;
  color: #1f2d3d;
}

.direct-chat-white .right > .direct-chat-text::after, .direct-chat-white .right > .direct-chat-text::before {
  border-left-color: #fff;
}

.direct-chat-gray .right > .direct-chat-text {
  background-color: #6c757d;
  border-color: #6c757d;
  color: #fff;
}

.direct-chat-gray .right > .direct-chat-text::after, .direct-chat-gray .right > .direct-chat-text::before {
  border-left-color: #6c757d;
}

.direct-chat-gray-dark .right > .direct-chat-text {
  background-color: #343a40;
  border-color: #343a40;
  color: #fff;
}

.direct-chat-gray-dark .right > .direct-chat-text::after, .direct-chat-gray-dark .right > .direct-chat-text::before {
  border-left-color: #343a40;
}

.dark-mode .direct-chat-text {
  background-color: #454d55;
  border-color: #4b545c;
  color: #fff;
}

.dark-mode .direct-chat-text::after, .dark-mode .direct-chat-text::before {
  border-right-color: #4b545c;
}

.dark-mode .direct-chat-timestamp {
  color: #adb5bd;
}

.dark-mode .right > .direct-chat-text::after, .dark-mode .right > .direct-chat-text::before {
  border-right-color: transparent;
}

.dark-mode .direct-chat-primary .right > .direct-chat-text {
  background-color: #3f6791;
  border-color: #3f6791;
  color: #fff;
}

.dark-mode .direct-chat-primary .right > .direct-chat-text::after, .dark-mode .direct-chat-primary .right > .direct-chat-text::before {
  border-left-color: #3f6791;
}

.dark-mode .direct-chat-secondary .right > .direct-chat-text {
  background-color: #6c757d;
  border-color: #6c757d;
  color: #fff;
}

.dark-mode .direct-chat-secondary .right > .direct-chat-text::after, .dark-mode .direct-chat-secondary .right > .direct-chat-text::before {
  border-left-color: #6c757d;
}

.dark-mode .direct-chat-success .right > .direct-chat-text {
  background-color: #00bc8c;
  border-color: #00bc8c;
  color: #fff;
}

.dark-mode .direct-chat-success .right > .direct-chat-text::after, .dark-mode .direct-chat-success .right > .direct-chat-text::before {
  border-left-color: #00bc8c;
}

.dark-mode .direct-chat-info .right > .direct-chat-text {
  background-color: #3498db;
  border-color: #3498db;
  color: #fff;
}

.dark-mode .direct-chat-info .right > .direct-chat-text::after, .dark-mode .direct-chat-info .right > .direct-chat-text::before {
  border-left-color: #3498db;
}

.dark-mode .direct-chat-warning .right > .direct-chat-text {
  background-color: #f39c12;
  border-color: #f39c12;
  color: #1f2d3d;
}

.dark-mode .direct-chat-warning .right > .direct-chat-text::after, .dark-mode .direct-chat-warning .right > .direct-chat-text::before {
  border-left-color: #f39c12;
}

.dark-mode .direct-chat-danger .right > .direct-chat-text {
  background-color: #e74c3c;
  border-color: #e74c3c;
  color: #fff;
}

.dark-mode .direct-chat-danger .right > .direct-chat-text::after, .dark-mode .direct-chat-danger .right > .direct-chat-text::before {
  border-left-color: #e74c3c;
}

.dark-mode .direct-chat-light .right > .direct-chat-text {
  background-color: #f8f9fa;
  border-color: #f8f9fa;
  color: #1f2d3d;
}

.dark-mode .direct-chat-light .right > .direct-chat-text::after, .dark-mode .direct-chat-light .right > .direct-chat-text::before {
  border-left-color: #f8f9fa;
}

.dark-mode .direct-chat-dark .right > .direct-chat-text {
  background-color: #343a40;
  border-color: #343a40;
  color: #fff;
}

.dark-mode .direct-chat-dark .right > .direct-chat-text::after, .dark-mode .direct-chat-dark .right > .direct-chat-text::before {
  border-left-color: #343a40;
}

.dark-mode .direct-chat-lightblue .right > .direct-chat-text {
  background-color: #86bad8;
  border-color: #86bad8;
  color: #1f2d3d;
}

.dark-mode .direct-chat-lightblue .right > .direct-chat-text::after, .dark-mode .direct-chat-lightblue .right > .direct-chat-text::before {
  border-left-color: #86bad8;
}

.dark-mode .direct-chat-navy .right > .direct-chat-text {
  background-color: #002c59;
  border-color: #002c59;
  color: #fff;
}

.dark-mode .direct-chat-navy .right > .direct-chat-text::after, .dark-mode .direct-chat-navy .right > .direct-chat-text::before {
  border-left-color: #002c59;
}

.dark-mode .direct-chat-olive .right > .direct-chat-text {
  background-color: #74c8a3;
  border-color: #74c8a3;
  color: #1f2d3d;
}

.dark-mode .direct-chat-olive .right > .direct-chat-text::after, .dark-mode .direct-chat-olive .right > .direct-chat-text::before {
  border-left-color: #74c8a3;
}

.dark-mode .direct-chat-lime .right > .direct-chat-text {
  background-color: #67ffa9;
  border-color: #67ffa9;
  color: #1f2d3d;
}

.dark-mode .direct-chat-lime .right > .direct-chat-text::after, .dark-mode .direct-chat-lime .right > .direct-chat-text::before {
  border-left-color: #67ffa9;
}

.dark-mode .direct-chat-fuchsia .right > .direct-chat-text {
  background-color: #f672d8;
  border-color: #f672d8;
  color: #1f2d3d;
}

.dark-mode .direct-chat-fuchsia .right > .direct-chat-text::after, .dark-mode .direct-chat-fuchsia .right > .direct-chat-text::before {
  border-left-color: #f672d8;
}

.dark-mode .direct-chat-maroon .right > .direct-chat-text {
  background-color: #ed6c9b;
  border-color: #ed6c9b;
  color: #1f2d3d;
}

.dark-mode .direct-chat-maroon .right > .direct-chat-text::after, .dark-mode .direct-chat-maroon .right > .direct-chat-text::before {
  border-left-color: #ed6c9b;
}

.dark-mode .direct-chat-blue .right > .direct-chat-text {
  background-color: #3f6791;
  border-color: #3f6791;
  color: #fff;
}

.dark-mode .direct-chat-blue .right > .direct-chat-text::after, .dark-mode .direct-chat-blue .right > .direct-chat-text::before {
  border-left-color: #3f6791;
}

.dark-mode .direct-chat-indigo .right > .direct-chat-text {
  background-color: #6610f2;
  border-color: #6610f2;
  color: #fff;
}

.dark-mode .direct-chat-indigo .right > .direct-chat-text::after, .dark-mode .direct-chat-indigo .right > .direct-chat-text::before {
  border-left-color: #6610f2;
}

.dark-mode .direct-chat-purple .right > .direct-chat-text {
  background-color: #6f42c1;
  border-color: #6f42c1;
  color: #fff;
}

.dark-mode .direct-chat-purple .right > .direct-chat-text::after, .dark-mode .direct-chat-purple .right > .direct-chat-text::before {
  border-left-color: #6f42c1;
}

.dark-mode .direct-chat-pink .right > .direct-chat-text {
  background-color: #e83e8c;
  border-color: #e83e8c;
  color: #fff;
}

.dark-mode .direct-chat-pink .right > .direct-chat-text::after, .dark-mode .direct-chat-pink .right > .direct-chat-text::before {
  border-left-color: #e83e8c;
}

.dark-mode .direct-chat-red .right > .direct-chat-text {
  background-color: #e74c3c;
  border-color: #e74c3c;
  color: #fff;
}

.dark-mode .direct-chat-red .right > .direct-chat-text::after, .dark-mode .direct-chat-red .right > .direct-chat-text::before {
  border-left-color: #e74c3c;
}

.dark-mode .direct-chat-orange .right > .direct-chat-text {
  background-color: #fd7e14;
  border-color: #fd7e14;
  color: #1f2d3d;
}

.dark-mode .direct-chat-orange .right > .direct-chat-text::after, .dark-mode .direct-chat-orange .right > .direct-chat-text::before {
  border-left-color: #fd7e14;
}

.dark-mode .direct-chat-yellow .right > .direct-chat-text {
  background-color: #f39c12;
  border-color: #f39c12;
  color: #1f2d3d;
}

.dark-mode .direct-chat-yellow .right > .direct-chat-text::after, .dark-mode .direct-chat-yellow .right > .direct-chat-text::before {
  border-left-color: #f39c12;
}

.dark-mode .direct-chat-green .right > .direct-chat-text {
  background-color: #00bc8c;
  border-color: #00bc8c;
  color: #fff;
}

.dark-mode .direct-chat-green .right > .direct-chat-text::after, .dark-mode .direct-chat-green .right > .direct-chat-text::before {
  border-left-color: #00bc8c;
}

.dark-mode .direct-chat-teal .right > .direct-chat-text {
  background-color: #20c997;
  border-color: #20c997;
  color: #fff;
}

.dark-mode .direct-chat-teal .right > .direct-chat-text::after, .dark-mode .direct-chat-teal .right > .direct-chat-text::before {
  border-left-color: #20c997;
}

.dark-mode .direct-chat-cyan .right > .direct-chat-text {
  background-color: #3498db;
  border-color: #3498db;
  color: #fff;
}

.dark-mode .direct-chat-cyan .right > .direct-chat-text::after, .dark-mode .direct-chat-cyan .right > .direct-chat-text::before {
  border-left-color: #3498db;
}

.dark-mode .direct-chat-white .right > .direct-chat-text {
  background-color: #fff;
  border-color: #fff;
  color: #1f2d3d;
}

.dark-mode .direct-chat-white .right > .direct-chat-text::after, .dark-mode .direct-chat-white .right > .direct-chat-text::before {
  border-left-color: #fff;
}

.dark-mode .direct-chat-gray .right > .direct-chat-text {
  background-color: #6c757d;
  border-color: #6c757d;
  color: #fff;
}

.dark-mode .direct-chat-gray .right > .direct-chat-text::after, .dark-mode .direct-chat-gray .right > .direct-chat-text::before {
  border-left-color: #6c757d;
}

.dark-mode .direct-chat-gray-dark .right > .direct-chat-text {
  background-color: #343a40;
  border-color: #343a40;
  color: #fff;
}

.dark-mode .direct-chat-gray-dark .right > .direct-chat-text::after, .dark-mode .direct-chat-gray-dark .right > .direct-chat-text::before {
  border-left-color: #343a40;
}


  .bg-gray>.card-header .btn-tool:hover,
  .bg-gradient-gray>.card-header .btn-tool:hover,
  .card-gray:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-gray .bootstrap-datetimepicker-widget .table td,
  .card.bg-gray .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-gray .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gray .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gray .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gray .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gray .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #596167;
    color: #fff;
  }

  .card.bg-gray .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-gray .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gray .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-gray .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #868e96;
    color: #fff;
  }

  .card-gray-dark:not(.card-outline)>.card-header {
    background-color: #343a40;
  }

  .card-gray-dark:not(.card-outline)>.card-header,
  .card-gray-dark:not(.card-outline)>.card-header a {
    color: #fff;
  }

  .card-gray-dark:not(.card-outline)>.card-header a.active {
    color: #1f2d3d;
  }

  .card-gray-dark.card-outline {
    border-top: 3px solid #343a40;
  }

  .card-gray-dark.card-outline-tabs>.card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card-gray-dark.card-outline-tabs>.card-header a.active,
  .card-gray-dark.card-outline-tabs>.card-header a.active:hover {
    border-top: 3px solid #343a40;
  }

  .bg-gray-dark>.card-header .btn-tool,
  .bg-gradient-gray-dark>.card-header .btn-tool,
  .card-gray-dark:not(.card-outline)>.card-header .btn-tool {
    color: rgba(255, 255, 255, 0.8);
  }

  .bg-gray-dark>.card-header .btn-tool:hover,
  .bg-gradient-gray-dark>.card-header .btn-tool:hover,
  .card-gray-dark:not(.card-outline)>.card-header .btn-tool:hover {
    color: #fff;
  }

  .card.bg-gray-dark .bootstrap-datetimepicker-widget .table td,
  .card.bg-gray-dark .bootstrap-datetimepicker-widget .table th,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget .table td,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget .table th {
    border: none;
  }

  .card.bg-gray-dark .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gray-dark .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gray-dark .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gray-dark .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gray-dark .bootstrap-datetimepicker-widget table td.second:hover,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget table thead tr:first-child th:hover,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget table td.day:hover,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget table td.hour:hover,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget table td.minute:hover,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget table td.second:hover {
    background-color: #222629;
    color: #fff;
  }

  .card.bg-gray-dark .bootstrap-datetimepicker-widget table td.today::before,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget table td.today::before {
    border-bottom-color: #fff;
  }

  .card.bg-gray-dark .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gray-dark .bootstrap-datetimepicker-widget table td.active:hover,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget table td.active,
  .card.bg-gradient-gray-dark .bootstrap-datetimepicker-widget table td.active:hover {
    background-color: #4b545c;
    color: #fff;
  }

  .card {
    box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
    margin-bottom: 1rem;
  }

  .card.bg-dark .card-header {
    border-color: #383f45;
  }

  .card.bg-dark,
  .card.bg-dark .card-body {
    color: #fff;
  }

  .card.maximized-card {
    height: 100% !important;
    left: 0;
    max-height: 100% !important;
    max-width: 100% !important;
    position: fixed;
    top: 0;
    width: 100% !important;
    z-index: 1040;
  }

  .card.maximized-card.was-collapsed .card-body {
    display: block !important;
  }

  .card.maximized-card .card-body {
    overflow: auto;
  }

  .card.maximized-card [data-card-widgett="collapse"] {
    display: none;
  }

  .card.maximized-card .card-header,
  .card.maximized-card .card-footer {
    border-radius: 0 !important;
  }

  .card.collapsed-card .card-body,
  .card.collapsed-card .card-footer {
    display: none;
  }

  .card .nav.flex-column:not(.nav-sidebar)>li {
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    margin: 0;
  }

  .card .nav.flex-column:not(.nav-sidebar)>li:last-of-type {
    border-bottom: 0;
  }

  .card.height-control .card-body {
    max-height: 300px;
    overflow: auto;
  }

  .card .border-right {
    border-right: 1px solid rgba(0, 0, 0, 0.125);
  }

  .card .border-left {
    border-left: 1px solid rgba(0, 0, 0, 0.125);
  }

  .card.card-tabs:not(.card-outline)>.card-header {
    border-bottom: 0;
  }

  .card.card-tabs:not(.card-outline)>.card-header .nav-item:first-child .nav-link {
    border-left-color: transparent;
  }

  .card.card-tabs.card-outline .nav-item {
    border-bottom: 0;
  }

  .card.card-tabs.card-outline .nav-item:first-child .nav-link {
    border-left: 0;
    margin-left: 0;
  }

  .card.card-tabs .card-tools {
    margin: .3rem .5rem;
  }

  .card.card-tabs:not(.expanding-card).collapsed-card .card-header {
    border-bottom: 0;
  }

  .card.card-tabs:not(.expanding-card).collapsed-card .card-header .nav-tabs {
    border-bottom: 0;
  }

  .card.card-tabs:not(.expanding-card).collapsed-card .card-header .nav-tabs .nav-item {
    margin-bottom: 0;
  }

  .card.card-tabs.expanding-card .card-header .nav-tabs .nav-item {
    margin-bottom: -1px;
  }

  .card.card-outline-tabs {
    border-top: 0;
  }

  .card.card-outline-tabs .card-header .nav-item:first-child .nav-link {
    border-left: 0;
    margin-left: 0;
  }

  .card.card-outline-tabs .card-header a {
    border-top: 3px solid transparent;
  }

  .card.card-outline-tabs .card-header a:hover {
    border-top: 3px solid #dee2e6;
  }

  .card.card-outline-tabs .card-header a.active:hover {
    margin-top: 0;
  }

  .card.card-outline-tabs .card-tools {
    margin: .5rem .5rem .3rem;
  }

  .card.card-outline-tabs:not(.expanding-card).collapsed-card .card-header {
    border-bottom: 0;
  }

  
.control-sidebar-dark .nav-tabs {
  background-color: rgba(255, 255, 255, 0.1);
  border-bottom: 0;
  margin-bottom: 5px;
}

.control-sidebar-dark .nav-tabs .nav-item {
  margin: 0;
}

.control-sidebar-dark .nav-tabs .nav-link {
  border-radius: 0;
  padding: 10px 20px;
  position: relative;
  text-align: center;
}

.control-sidebar-dark .nav-tabs .nav-link, .control-sidebar-dark .nav-tabs .nav-link:hover, .control-sidebar-dark .nav-tabs .nav-link:active, .control-sidebar-dark .nav-tabs .nav-link:focus, .control-sidebar-dark .nav-tabs .nav-link.active {
  border: 0;
}

.control-sidebar-dark .nav-tabs .nav-link:hover, .control-sidebar-dark .nav-tabs .nav-link:active, .control-sidebar-dark .nav-tabs .nav-link:focus, .control-sidebar-dark .nav-tabs .nav-link.active {
  border-bottom-color: transparent;
  border-left-color: transparent;
  border-top-color: transparent;
  color: #fff;
}

.control-sidebar-dark .nav-tabs .nav-link.active {
  background-color: #343a40;
}
.nav-tabs.flex-column {
  border-bottom: 0;
  border-right: 1px solid #dee2e6;
}

.nav-tabs.flex-column .nav-link {
  border-bottom-left-radius: 0.25rem;
  border-top-right-radius: 0;
  margin-right: -1px;
}

.nav-tabs.flex-column .nav-link:hover, .nav-tabs.flex-column .nav-link:focus {
  border-color: #e9ecef transparent #e9ecef #e9ecef;
}

.nav-tabs.flex-column .nav-link.active,
.nav-tabs.flex-column .nav-item.show .nav-link {
  border-color: #dee2e6 transparent #dee2e6 #dee2e6;
}

.nav-tabs.flex-column.nav-tabs-right {
  border-left: 1px solid #dee2e6;
  border-right: 0;
}

.nav-tabs.flex-column.nav-tabs-right .nav-link {
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0.25rem;
  border-top-left-radius: 0;
  border-top-right-radius: 0.25rem;
  margin-left: -1px;
}

.nav-tabs.flex-column.nav-tabs-right .nav-link:hover, .nav-tabs.flex-column.nav-tabs-right .nav-link:focus {
  border-color: #e9ecef #e9ecef #e9ecef transparent;
}

.nav-tabs.flex-column.nav-tabs-right .nav-link.active,
.nav-tabs.flex-column.nav-tabs-right .nav-item.show .nav-link {
  border-color: #dee2e6 #dee2e6 #dee2e6 transparent;
}

.dark-mode .nav-tabs {
  border-color: #56606a;
}

.dark-mode .nav-tabs .nav-link:focus,
.dark-mode .nav-tabs .nav-link:hover {
  border-color: #56606a;
}

.dark-mode .nav-tabs .nav-item.show .nav-link,
.dark-mode .nav-tabs .nav-link.active {
  background-color: #343a40;
  border-color: #56606a #56606a transparent #56606a;
  color: #fff;
}


  .card.card-outline-tabs:not(.expanding-card).collapsed-card .card-header .nav-tabs {
    border-bottom: 0;
  }

  .card.card-outline-tabs:not(.expanding-card).collapsed-card .card-header .nav-tabs .nav-item {
    margin-bottom: 0;
  }

  .card.card-outline-tabs.expanding-card .card-header .nav-tabs .nav-item {
    margin-bottom: -1px;
  }

  html.maximized-card {
    overflow: hidden;
  }

  .card-header::after,
  .card-body::after,
  .card-footer::after {
    display: block;
    clear: both;
    content: "";
  }

  .card-header {
    background-color: transparent;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    padding: 0.75rem 1.25rem;
    position: relative;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
  }

  .collapsed-card .card-header {
    border-bottom: 0;
  }

  .card-header>.card-tools {
    float: right;
    margin-right: -0.625rem;
  }

  .card-header>.card-tools .input-group,
  .card-header>.card-tools .nav,
  .card-header>.card-tools .pagination {
    margin-bottom: -0.3rem;
    margin-top: -0.3rem;
  }

  .card-header>.card-tools [data-toggle="tooltip"] {
    position: relative;
  }

  
.login-card-body .input-group .form-control,
.register-card-body .input-group .form-control {
  border-right: 0;
}

.login-card-body .input-group .form-control:focus,
.register-card-body .input-group .form-control:focus {
  box-shadow: none;
}

.login-card-body .input-group .form-control:focus ~ .input-group-prepend .input-group-text,
.login-card-body .input-group .form-control:focus ~ .input-group-append .input-group-text,
.register-card-body .input-group .form-control:focus ~ .input-group-prepend .input-group-text,
.register-card-body .input-group .form-control:focus ~ .input-group-append .input-group-text {
  border-color: #80bdff;
}

.login-card-body .input-group .form-control.is-valid:focus,
.register-card-body .input-group .form-control.is-valid:focus {
  box-shadow: none;
}

.login-card-body .input-group .form-control.is-valid ~ .input-group-prepend .input-group-text,
.login-card-body .input-group .form-control.is-valid ~ .input-group-append .input-group-text,
.register-card-body .input-group .form-control.is-valid ~ .input-group-prepend .input-group-text,
.register-card-body .input-group .form-control.is-valid ~ .input-group-append .input-group-text {
  border-color: #28a745;
}
.input-group > .select2-container--default:not(:last-child) .select2-selection {
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
}

.login-card-body .input-group .form-control,
.register-card-body .input-group .form-control {
  border-right: 0;
}

.input-group {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  width: 100%;
}

.input-group > .form-control,
.input-group > .custom-select,
.input-group > .custom-file {
  position: relative;
  flex: 1 1 auto;
  width: 1%;
  margin-bottom: 0;
}

.input-group > .form-control:focus,
.input-group > .custom-select:focus,
.input-group > .custom-file:focus {
  z-index: 3;
}

.input-group > .form-control:not(:last-child),
.input-group > .custom-select:not(:last-child) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.input-group > .form-control:not(:first-child),
.input-group > .custom-select:not(:first-child) {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.input-group > .custom-file {
  display: flex;
  align-items: center;
}

.input-group > .custom-file:not(:last-child) .custom-file-label,
.input-group > .custom-file:not(:last-child) .custom-file-label::after {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.input-group > .custom-file:not(:first-child) .custom-file-label {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.login-card-body .input-group .form-control:focus,
.register-card-body .input-group .form-control:focus {
  box-shadow: none;
}

.login-card-body .input-group .form-control:focus ~ .input-group-prepend .input-group-text,
.login-card-body .input-group .form-control:focus ~ .input-group-append .input-group-text,
.register-card-body .input-group .form-control:focus ~ .input-group-prepend .input-group-text,
.register-card-body .input-group .form-control:focus ~ .input-group-append .input-group-text {
  border-color: #80bdff;
}

.login-card-body .input-group .form-control.is-valid:focus,
.register-card-body .input-group .form-control.is-valid:focus {
  box-shadow: none;
}

.login-card-body .input-group .form-control.is-valid ~ .input-group-prepend .input-group-text,
.login-card-body .input-group .form-control.is-valid ~ .input-group-append .input-group-text,
.register-card-body .input-group .form-control.is-valid ~ .input-group-prepend .input-group-text,
.register-card-body .input-group .form-control.is-valid ~ .input-group-append .input-group-text {
  border-color: #28a745;
}

.login-card-body .input-group .form-control.is-invalid:focus,
.register-card-body .input-group .form-control.is-invalid:focus {
  box-shadow: none;
}

.login-card-body .input-group .form-control.is-invalid ~ .input-group-append .input-group-text,
.register-card-body .input-group .form-control.is-invalid ~ .input-group-append .input-group-text {
  border-color: #dc3545;
}

.login-card-body .input-group .input-group-text,
.register-card-body .input-group .input-group-text {
  background-color: transparent;
  border-bottom-right-radius: 0.25rem;
  border-left: 0;
  border-top-right-radius: 0.25rem;
  color: #777;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.login-card-body .input-group .form-control.is-invalid:focus,
.register-card-body .input-group .form-control.is-invalid:focus {
  box-shadow: none;
}

.login-card-body .input-group .form-control.is-invalid ~ .input-group-append .input-group-text,
.register-card-body .input-group .form-control.is-invalid ~ .input-group-append .input-group-text {
  border-color: #dc3545;
}

.login-card-body .input-group .input-group-text,
.register-card-body .input-group .input-group-text {
  background-color: transparent;
  border-bottom-right-radius: 0.25rem;
  border-left: 0;
  border-top-right-radius: 0.25rem;
  color: #777;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.input-group-prepend ~ .select2-container--default .select2-selection {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}

.input-group > .select2-container--default:not(:last-child) .select2-selection {
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
}
.form-inline .input-group,
  .form-inline .custom-select {
    width: auto;
  }

  .card-title {
    float: left;
    font-size: 1.1rem;
    font-weight: 400;
    margin: 0;
  }

  .card-text {
    clear: both;
  }

  .rounded-pill {
    border-radius: 50rem !important;
  }

  .rounded {
    border-radius: 0.25rem !important;
  }

  .btn-outline-primary {
    color: #007bff;
    border-color: #007bff;
  }

  .btn-outline-primary:hover {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-outline-primary:focus,
  .btn-outline-primary.focus {
    box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.5);
  }

  .btn-outline-primary.disabled,
  .btn-outline-primary:disabled {
    color: #007bff;
    background-color: transparent;
  }

  .btn-outline-primary:not(:disabled):not(.disabled):active,
  .btn-outline-primary:not(:disabled):not(.disabled).active,
  .show>.btn-outline-primary.dropdown-toggle {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-outline-primary:not(:disabled):not(.disabled):active:focus,
  .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
  .show>.btn-outline-primary.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.5);
  }

  .btn-outline-secondary {
    color: #6c757d;
    border-color: #6c757d;
  }

  .btn-outline-secondary:hover {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
  }

  .btn-outline-secondary:focus,
  .btn-outline-secondary.focus {
    box-shadow: 0 0 0 0 rgba(108, 117, 125, 0.5);
  }

  .btn-outline-secondary.disabled,
  .btn-outline-secondary:disabled {
    color: #6c757d;
    background-color: transparent;
  }

  .btn-outline-secondary:not(:disabled):not(.disabled):active,
  .btn-outline-secondary:not(:disabled):not(.disabled).active,
  .show>.btn-outline-secondary.dropdown-toggle {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
  }

  .btn-outline-secondary:not(:disabled):not(.disabled):active:focus,
  .btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
  .show>.btn-outline-secondary.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(108, 117, 125, 0.5);
  }

  .btn-outline-success {
    color: #28a745;
    border-color: #28a745;
  }

  .btn-outline-success:hover {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
  }

  .btn-outline-success:focus,
  .btn-outline-success.focus {
    box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.5);
  }

  .btn-outline-success.disabled,
  .btn-outline-success:disabled {
    color: #28a745;
    background-color: transparent;
  }

  .btn-outline-success:not(:disabled):not(.disabled):active,
  .btn-outline-success:not(:disabled):not(.disabled).active,
  .show>.btn-outline-success.dropdown-toggle {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
  }

  .btn-outline-success:not(:disabled):not(.disabled):active:focus,
  .btn-outline-success:not(:disabled):not(.disabled).active:focus,
  .show>.btn-outline-success.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.5);
  }

  .btn-outline-info {
    color: #17a2b8;
    border-color: #17a2b8;
  }

  .btn-outline-info:hover {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
  }

  .btn-outline-info:focus,
  .btn-outline-info.focus {
    box-shadow: 0 0 0 0 rgba(23, 162, 184, 0.5);
  }

  .btn-outline-info.disabled,
  .btn-outline-info:disabled {
    color: #17a2b8;
    background-color: transparent;
  }

  .btn-outline-info:not(:disabled):not(.disabled):active,
  .btn-outline-info:not(:disabled):not(.disabled).active,
  .show>.btn-outline-info.dropdown-toggle {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
  }

  .btn-outline-info:not(:disabled):not(.disabled):active:focus,
  .btn-outline-info:not(:disabled):not(.disabled).active:focus,
  .show>.btn-outline-info.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(23, 162, 184, 0.5);
  }

  .btn-outline-warning {
    color: #ffc107;
    border-color: #ffc107;
  }

  .btn-outline-warning:hover {
    color: #1f2d3d;
    background-color: #ffc107;
    border-color: #ffc107;
  }

  .btn-outline-warning:focus,
  .btn-outline-warning.focus {
    box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.5);
  }

  .btn-outline-warning.disabled,
  .btn-outline-warning:disabled {
    color: #ffc107;
    background-color: transparent;
  }

  .btn-outline-warning:not(:disabled):not(.disabled):active,
  .btn-outline-warning:not(:disabled):not(.disabled).active,
  .show>.btn-outline-warning.dropdown-toggle {
    color: #1f2d3d;
    background-color: #ffc107;
    border-color: #ffc107;
  }

  .btn-outline-warning:not(:disabled):not(.disabled):active:focus,
  .btn-outline-warning:not(:disabled):not(.disabled).active:focus,
  .show>.btn-outline-warning.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.5);
  }

  .btn-outline-danger {
    color: #dc3545;
    border-color: #dc3545;
  }

  .btn-outline-danger:hover {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
  }

  .btn-outline-danger:focus,
  .btn-outline-danger.focus {
    box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.5);
  }

  .btn-outline-danger.disabled,
  .btn-outline-danger:disabled {
    color: #dc3545;
    background-color: transparent;
  }

  .btn-outline-danger:not(:disabled):not(.disabled):active,
  .btn-outline-danger:not(:disabled):not(.disabled).active,
  .show>.btn-outline-danger.dropdown-toggle {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
  }

  .btn-outline-danger:not(:disabled):not(.disabled):active:focus,
  .btn-outline-danger:not(:disabled):not(.disabled).active:focus,
  .show>.btn-outline-danger.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.5);
  }

  .btn-outline-light {
    color: #f8f9fa;
    border-color: #f8f9fa;
  }

  .btn-outline-light:hover {
    color: #1f2d3d;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
  }

  .btn-outline-light:focus,
  .btn-outline-light.focus {
    box-shadow: 0 0 0 0 rgba(248, 249, 250, 0.5);
  }

  .btn-outline-light.disabled,
  .btn-outline-light:disabled {
    color: #f8f9fa;
    background-color: transparent;
  }

  .btn-outline-light:not(:disabled):not(.disabled):active,
  .btn-outline-light:not(:disabled):not(.disabled).active,
  .show>.btn-outline-light.dropdown-toggle {
    color: #1f2d3d;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
  }

  .btn-outline-light:not(:disabled):not(.disabled):active:focus,
  .btn-outline-light:not(:disabled):not(.disabled).active:focus,
  .show>.btn-outline-light.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(248, 249, 250, 0.5);
  }

  .btn-outline-dark {
    color: #343a40;
    border-color: #343a40;
  }

  .btn-outline-dark:hover {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
  }

  .btn-outline-dark:focus,
  .btn-outline-dark.focus {
    box-shadow: 0 0 0 0 rgba(52, 58, 64, 0.5);
  }

  .btn-outline-dark.disabled,
  .btn-outline-dark:disabled {
    color: #343a40;
    background-color: transparent;
  }

  .btn-outline-dark:not(:disabled):not(.disabled):active,
  .btn-outline-dark:not(:disabled):not(.disabled).active,
  .show>.btn-outline-dark.dropdown-toggle {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
  }

  .btn-outline-dark:not(:disabled):not(.disabled):active:focus,
  .btn-outline-dark:not(:disabled):not(.disabled).active:focus,
  .show>.btn-outline-dark.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(52, 58, 64, 0.5);
  }

  .d-none {
    display: none !important;
  }

  @media (min-width: 768px) {
    .d-md-none {
      display: none !important;
    }

    .d-md-inline {
      display: inline !important;
    }

    .d-md-inline-block {
      display: inline-block !important;
    }

    .d-md-block {
      display: block !important;
    }

    .d-md-table {
      display: table !important;
    }

    .d-md-table-row {
      display: table-row !important;
    }

    .d-md-table-cell {
      display: table-cell !important;
    }

    .d-md-flex {
      display: -ms-flexbox !important;
      display: flex !important;
    }

    .d-md-inline-flex {
      display: -ms-inline-flexbox !important;
      display: inline-flex !important;
    }
  }

  @media (min-width: 768px) {
    .float-md-left {
      float: left !important;
    }

    .float-md-right {
      float: right !important;
    }

    .float-md-none {
      float: none !important;
    }
  }

  .modal-dialog .overlay {
    display: -ms-flexbox;
    display: flex;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    margin: -1px;
    z-index: 1052;
    -ms-flex-pack: center;
    justify-content: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.7);
    color: #666f76;
    border-radius: 0.3rem;
  }

  .modal-content.bg-warning .modal-header,
  .modal-content.bg-warning .modal-footer {
    border-color: #343a40;
  }

  .modal-content.bg-primary .close,
  .modal-content.bg-primary .mailbox-attachment-close,
  .modal-content.bg-secondary .close,
  .modal-content.bg-secondary .mailbox-attachment-close,
  .modal-content.bg-info .close,
  .modal-content.bg-info .mailbox-attachment-close,
  .modal-content.bg-danger .close,
  .modal-content.bg-danger .mailbox-attachment-close,
  .modal-content.bg-success .close,
  .modal-content.bg-success .mailbox-attachment-close {
    color: #fff;
    text-shadow: 0 1px 0 #000;
  }

  .dark-mode .modal-header,
  .dark-mode .modal-footer {
    border-color: #6c757d;
  }

  .dark-mode .modal-content {
    background-color: #343a40;
  }

  .dark-mode .modal-content.bg-warning .modal-header,
  .dark-mode .modal-content.bg-warning .modal-footer {
    border-color: #6c757d;
  }

  .dark-mode .modal-content.bg-warning .close,
  .dark-mode .modal-content.bg-warning .mailbox-attachment-close {
    color: #343a40 !important;
    text-shadow: 0 1px 0 #495057 !important;
  }

  .dark-mode .modal-content.bg-primary .modal-header,
  .dark-mode .modal-content.bg-primary .modal-footer,
  .dark-mode .modal-content.bg-secondary .modal-header,
  .dark-mode .modal-content.bg-secondary .modal-footer,
  .dark-mode .modal-content.bg-info .modal-header,
  .dark-mode .modal-content.bg-info .modal-footer,
  .dark-mode .modal-content.bg-danger .modal-header,
  .dark-mode .modal-content.bg-danger .modal-footer,
  .dark-mode .modal-content.bg-success .modal-header,
  .dark-mode .modal-content.bg-success .modal-footer {
    border-color: #fff;
  }

  .modal-open {
    overflow: hidden;
  }

  .modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
  }

  .modal {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0;
  }

  .modal-dialog {
    position: relative;
    width: auto;
    margin: 0.5rem;
    pointer-events: none;
    top: 100px;
    /* z-index: 9999999999; */
  }

  .modal.fade .modal-dialog {
    transition: -webkit-transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
    transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
    -webkit-transform: translate(0, -50px);
    transform: translate(0, -50px);
  }

  @media (prefers-reduced-motion: reduce) {
    .modal.fade .modal-dialog {
      transition: none;
    }
  }

  .modal.show .modal-dialog {
    -webkit-transform: none;
    transform: none;
  }

  .modal.modal-static .modal-dialog {
    -webkit-transform: scale(1.02);
    transform: scale(1.02);
  }

  .modal-dialog-scrollable {
    display: -ms-flexbox;
    display: flex;
    max-height: calc(100% - 1rem);
  }

  .modal-dialog-scrollable .modal-content {
    max-height: calc(100vh - 1rem);
    overflow: hidden;
  }

  .modal-dialog-scrollable .modal-header,
  .modal-dialog-scrollable .modal-footer {
    -ms-flex-negative: 0;
    flex-shrink: 0;
  }

  .modal-dialog-scrollable .modal-body {
    overflow-y: auto;
  }

  .modal-dialog-centered {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    min-height: calc(100% - 1rem);
  }

  .modal-dialog-centered::before {
    display: block;
    height: calc(100vh - 1rem);
    height: -webkit-min-content;
    height: -moz-min-content;
    height: min-content;
    content: "";
  }

  .modal-dialog-centered.modal-dialog-scrollable {
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-pack: center;
    justify-content: center;
    height: 100%;
  }

  .modal-dialog-centered.modal-dialog-scrollable .modal-content {
    max-height: none;
  }

  .modal-dialog-centered.modal-dialog-scrollable::before {
    content: none;
  }

  .modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.5);
    outline: 0;
  }

  .modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 0;
    width: 100vw;
    height: 100vh;
    background-color: #000;
  }

  .modal-backdrop.fade {
    opacity: 0;
  }

  .modal-backdrop.show {
    opacity: 0.5;
  }

  .modal-header {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid #e9ecef;
    border-top-left-radius: calc(0.3rem - 1px);
    border-top-right-radius: calc(0.3rem - 1px);
  }

  .modal-header .close,
  .modal-header .mailbox-attachment-close {
    padding: 1rem;
    margin: -1rem -1rem -1rem auto;
  }

  .modal-title {
    margin-bottom: 0;
    line-height: 1.5;
  }

  .modal-body {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
  }

  .modal-footer {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding: 0.75rem;
    border-top: 1px solid #e9ecef;
    border-bottom-right-radius: calc(0.3rem - 1px);
    border-bottom-left-radius: calc(0.3rem - 1px);
  }

  .modal-footer>* {
    margin: 0.25rem;
  }

  .modal-scrollbar-measure {
    position: absolute;
    top: -9999px;
    width: 50px;
    height: 50px;
    overflow: scroll;
  }

  @media (min-width: 576px) {
    .modal-dialog {
      max-width: 500px;
      margin: 1.75rem auto;
    }

    .modal-dialog-scrollable {
      max-height: calc(100% - 3.5rem);
    }

    .modal-dialog-scrollable .modal-content {
      max-height: calc(100vh - 3.5rem);
    }

    .modal-dialog-centered {
      min-height: calc(100% - 3.5rem);
    }

    .modal-dialog-centered::before {
      height: calc(100vh - 3.5rem);
      height: -webkit-min-content;
      height: -moz-min-content;
      height: min-content;
    }

    .modal-content {
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.5);
    }

    .modal-sm {
      max-width: 300px;
    }
  }

  @media (min-width: 992px) {

    .modal-lg,
    .modal-xl {
      max-width: 800px;
    }
  }

  @media (min-width: 1200px) {
    .modal-xl {
      max-width: 1140px;
    }
  }

  .float-right {
    float: right !important;
  }

  
.nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.nav-link {
  display: block;
  padding: 0.5rem 1rem;
}

.nav-link:hover, .nav-link:focus {
  text-decoration: none;
}

.nav-link.disabled {
  color: #6c757d;
  pointer-events: none;
  cursor: default;
}

.nav-tabs {
  border-bottom: 1px solid #dee2e6;
}

.nav-tabs .nav-link {
  margin-bottom: -1px;
  border: 1px solid transparent;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}

.nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
  border-color: #e9ecef #e9ecef #dee2e6;
}

.nav-tabs .nav-link.disabled {
  color: #6c757d;
  background-color: transparent;
  border-color: transparent;
}

.nav-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.nav-pills .nav-link {
  border-radius: 0.25rem;
}

.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: #007bff;
}

.nav-fill > .nav-link,
.nav-fill .nav-item {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  text-align: center;
}

.nav-justified > .nav-link,
.nav-justified .nav-item {
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
  -ms-flex-positive: 1;
  flex-grow: 1;
  text-align: center;
}

.tab-content > .tab-pane {
  display: none;
}

.tab-content > .active {
  display: block;
}
  .nav-sidebar>.nav-item .float-right {
    margin-top: 3px;
  }

  .nav-sidebar .nav-item>.nav-link>.float-right {
    margin-top: -7px;
    position: absolute;
    right: 10px;
    top: 50%;
  }

  .float-left {
    float: left !important;
  }


  .btn-light {
    color: #1f2d3d;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
    box-shadow: none;
  }

  .btn-light:hover {
    color: #1f2d3d;
    background-color: #e2e6ea;
    border-color: #dae0e5;
  }

  .btn-light:focus,
  .btn-light.focus {
    color: #1f2d3d;
    background-color: #e2e6ea;
    border-color: #dae0e5;
    box-shadow: 0 0 0 0 rgba(215, 218, 222, 0.5);
  }

  .btn-light.disabled,
  .btn-light:disabled {
    color: #1f2d3d;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
  }

  .btn-light:not(:disabled):not(.disabled):active,
  .btn-light:not(:disabled):not(.disabled).active,
  .show>.btn-light.dropdown-toggle {
    color: #1f2d3d;
    background-color: #dae0e5;
    border-color: #d3d9df;
  }

  .btn-light:not(:disabled):not(.disabled):active:focus,
  .btn-light:not(:disabled):not(.disabled).active:focus,
  .show>.btn-light.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(215, 218, 222, 0.5);
  }


  .dark-mode .btn-light {
    background-color: #454d55;
    color: #fff;
    border-color: #6c757d;
  }

  .dark-mode .btn-light:hover,
  .dark-mode .btn-light:focus {
    background-color: #4b545c;
    color: #dee2e6;
    border-color: #78828a;
  }

  .dark-mode .btn-light {
    color: #1f2d3d;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
    box-shadow: none;
  }

  .dark-mode .btn-light:hover {
    color: #1f2d3d;
    background-color: #e2e6ea;
    border-color: #dae0e5;
  }

  .dark-mode .btn-light:focus,
  .dark-mode .btn-light.focus {
    color: #1f2d3d;
    background-color: #e2e6ea;
    border-color: #dae0e5;
    box-shadow: 0 0 0 0 rgba(215, 218, 222, 0.5);
  }

  .dark-mode .btn-light.disabled,
  .dark-mode .btn-light:disabled {
    color: #1f2d3d;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
  }

  .dark-mode .btn-light:not(:disabled):not(.disabled):active,
  .dark-mode .btn-light:not(:disabled):not(.disabled).active,
  .show>.dark-mode .btn-light.dropdown-toggle {
    color: #1f2d3d;
    background-color: #dae0e5;
    border-color: #d3d9df;
  }

  .dark-mode .btn-light:not(:disabled):not(.disabled):active:focus,
  .dark-mode .btn-light:not(:disabled):not(.disabled).active:focus,
  .show>.dark-mode .btn-light.dropdown-toggle:focus {
    box-shadow: 0 0 0 0 rgba(215, 218, 222, 0.5);
  }

  [class*="accent-"] a.btn-light {
    color: #1f2d3d;
  }

  .dark-mode [class*="accent-"] a.btn-light {
    color: #1f2d3d;
  }

  .text-muted {
    color: #6c757d !important;
  }

  .card-comments .text-muted {
    font-size: 12px;
    font-weight: 400;
  }

  .dark-mode .text-muted {
    color: #adb5bd !important;
  }

  a.text-muted:hover {
    color: #007bff !important;
  }

  p {
    color: #6c757d;
  }

  .text-info {
    color: #17a2b8 !important;
  }

  .nav-tabs {
  border-bottom: 1px solid #dee2e6;
}

.nav-tabs .nav-link {
  margin-bottom: -1px;
  background-color: #f8f9fa;
  border: 1px solid transparent;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem;
}

.nav-tabs .nav-link:hover {
  border-color: #e9ecef #e9ecef #dee2e6;
}

.nav-tabs .nav-link.active {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs .nav-link.disabled {
  color: #6c757d;
  background-color: #f8f9fa;
  border-color: transparent;
}

.nav-tabs .nav-link.disabled:hover {
  background-color: #f8f9fa;
  border-color: transparent;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff;
}

.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.nav-tabs .dropdown-item.active,
.nav-tabs .dropdown-item:active {
  color: #fff;
  text-decoration: none;
  background-color: #007bff;
}

.nav-tabs .nav-link.disabled:hover,
.nav-tabs .dropdown-item.disabled:hover {
  background-color: transparent;
  border-color: transparent;
}

.nav-tabs .nav-link:focus,
.nav-tabs .dropdown-item:focus {
  outline: none;
  box-shadow: none;
}

.nav {
  display: flex;
  flex-wrap: wrap;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.nav-link {
  display: block;
  padding: .5rem 1rem;
}

.nav-link:hover,
.nav-link:focus {
  text-decoration: none;
}

.nav-link.disabled {
  color: #6c757d;
  pointer-events: none;
  cursor: default;
}

.nav-tabs {
  border-bottom: 1px solid #dee2e6;
}

.nav-tabs .nav-item {
  margin-bottom: -1px;
}

.nav-tabs .nav-link {
  border: 1px solid transparent;
  border-top-left-radius: .25rem;
  border-top-right-radius: .25rem;
}

.nav-tabs .nav-link:hover,
.nav-tabs .nav-link:focus {
  border-color: #e9ecef #e9ecef #dee2e6;
}

.nav-tabs .nav-link.disabled {
  color: #6c757d;
  background-color: transparent;
  border-color: transparent;
}

.nav-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
  color: #495057;
  background-color: #fff;
  border-color: #dee2e6 #dee2e6 #fff;
}

.nav-pills .nav-link {
  border-radius: .25rem;
}

.nav-fill .nav-item {
  flex: 1 1 auto;
  text-align: center;
}

.nav-justified .nav-item {
  flex-basis: 0;
  flex-grow: 1;
  text-align: center;
}
.flex-column {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}


</style>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- 20 06 2026 - JRodriguez -->
<!-- automaticForm -->
<!-- agrego plugins automaticForm para cruds automáticos -->
<script src="plugins/automaticForm/personalizado.js"></script>
<script src="plugins/automaticForm/automaticForm.js"></script>
<script src="plugins/automaticForm/systemConfigForm.js"></script>
<!-- 20 06 2026 - JRodriguez -->

<script>
  // inicializar  modal
  $(document).ready(function() {
    setTimeout(() => {
      var textareas = document.querySelectorAll('.editorJR');
      for (var i = 0; i < textareas.length; i++) {
        CKEDITOR.replace(textareas[i]);
      }
    }, 1000);
  })
</script>