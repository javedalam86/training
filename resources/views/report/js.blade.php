  <!-- begin::Global Config(global config for global JS sciprts) -->
<script nonce="{{ csrf_token() }}">
  var KTAppOptions = {
      "colors": {
      "state": {
        "brand": "#2c77f4",
        "light": "#ffffff",
        "dark": "#282a3c",
        "primary": "#5867dd",
        "success": "#34bfa3",
        "info": "#36a3f7",
        "warning": "#ffb822",
        "danger": "#fd3995"
      },
      "base": {
        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
      }
    }
  };
</script>
<!-- end::Global Config -->
<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{ asset('assetsadmin/plugins/global/plugins.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>

<script src="{{ asset('assetsadmin/js/scripts.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>
<script src="{{ asset('assetsadmin/js/pages/crud/metronic-datatable/base/report.js?v='.$scriptVer) }}" type="text/javascript"></script>
<script nonce="{{ csrf_token() }}">
  $( document ).ready(function() {
      $('#startDate').datepicker({
        format: 'yyyy-mm-dd'
      });
      $('#endDate').datepicker({
        format: 'yyyy-mm-dd'
      });
    });
 $('#kt_form_course,#kt_form_candidate').selectpicker();
</script>
<style type="text/css">
  .datepicker {
    z-index: 999 !important;
  }
</style>