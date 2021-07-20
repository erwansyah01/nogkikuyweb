<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url () ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url () ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url () ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url () ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url () ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url () ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url () ?>assets/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

</body> 
<script>
   (function(exports) {
    function urlsToAbsolute(nodeList) {
        if (!nodeList.length) {
            return [];
        }
        var attrName = 'href';
        if (nodeList[0].__proto__ === HTMLImageElement.prototype || nodeList[0].__proto__ === HTMLScriptElement.prototype) {
            attrName = 'src';
        }
        nodeList = [].map.call(nodeList, function(el, i) {
            var attr = el.getAttribute(attrName);
            if (!attr) {
                return;
            }
            var absURL = /^(https?|data):/i.test(attr);
            if (absURL) {
                return el;
            } else {
                return el;
            }
        });
        return nodeList;
    }

    function screenshotPage() {
        var wrapper = document.getElementById('wrapper');
        html2canvas(wrapper, {
            onrendered: function(canvas) {
                canvas.toBlob(function(blob) {
                    saveAs(blob, 'Pesananku.png');
                });
            }
        });
    }

    function addOnPageLoad_() {
        window.addEventListener('DOMContentLoaded', function(e) {
            var scrollX = document.documentElement.dataset.scrollX || 0;
            var scrollY = document.documentElement.dataset.scrollY || 0;
            window.scrollTo(scrollX, scrollY);
        });
    }

    function generate() {
        screenshotPage();
    }
    exports.screenshotPage = screenshotPage;
    exports.generate = generate;
})(window);

$(document).ready(function() {
    var condition = 0; //i get this from database
    var c = condition;


    if(c == 0){

            $('#a').css({'display':''});   
    }else if(c == 1){

            $('#b').css({'display':''});
    }

        $('#a').click(function(){
              $('#a').hide();
              $('#b').show();
        });
        $('#b').click(function(){
              $('#b').hide();
              $('#a').show();
        });
    });
</script>
</html>