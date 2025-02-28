<style>
  .main {
  background-image: url("https://images.unsplash.com/photo-1556742205-e10c9486e506?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60");
  color: #00cc65;
  width: 500px;
  padding-left: 25px;
  padding-top: 10rem;
}
</style>
<!-- partial:index.partial.html -->
<div id="html-content-holder" class="main">
        <h3 style="color: #3e4b51;">
            This is a demo
        </h3>
    </div>
    <a id="btn-Convert-Html2Image" href="#">Download</a>
    <br />
    <div id="previewImage" style="display: none;">
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script>
  $(document).ready(function () {
            var element = $("#html-content-holder"); // global variable
            var getCanvas; // global variable

            html2canvas(element, {
                onrendered: function (canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });

            $("#btn-Convert-Html2Image").on('click', function () {
                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
            });
        });
</script>

