<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Demo page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Real Estate Management System." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
       
<style>
#the-canvas {
  border: 1px solid black;
  direction: ltr;
}
</style>
    </head>

<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>

<h1>Sample PDF Viewer</h1>

<div>
  <button id="prev">Previous</button>
  <button id="next">Next</button>
  
      <button id="zoominbutton" type="button">zoom in</button>
      <button id="zoomoutbutton" type="button">zoom out</button>
  &nbsp; &nbsp;
  <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
</div>
<div style="width:950px;height:600px;overflow-y:scroll;">
<canvas id="the-canvas" oncontextmenu="return false;" ></canvas>
</div>
  
    </body>
</html>

<script type="text/javascript">


 // If absolute URL from the remote server is provided, configure the CORS
// header on that server.
var url = 'https://raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/web/compressed.tracemonkey-pldi-09.pdf';
var url = 'http://159.65.158.172/public/viewpdf/instruction.pdf';

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 1.5,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport({scale: scale});
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    });
  });

  // Update page counters
  document.getElementById('page_num').textContent = num;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);



document.getElementById('zoominbutton').addEventListener('click', zoominbuttonfun); 
document.getElementById('zoomoutbutton').addEventListener('click', zoomoutbuttonfun); 

function zoominbuttonfun(){
	scale = scale + 0.25;   queueRenderPage(pageNum);
	
}function zoomoutbuttonfun(){
	   scale = scale - 0.25;   queueRenderPage(pageNum);
}
/*
       var zoominbutton = document.getElementById("zoominbutton");
         zoominbutton.onclick = function() {
            scale = scale + 0.25; renderPage(num);
          //  displayPage(shownPdf, pageNum);
         }

         var zoomoutbutton = document.getElementById("zoomoutbutton");
         zoomoutbutton.onclick = function() {
            if (scale <= 0.25) {
               return;
            }
            scale = scale - 0.25; renderPage(num);
            //displayPage(shownPdf, pageNum);
         }  */
		 
/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);

/**
 * Asynchronously downloads PDF.
 */
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = pdfDoc.numPages;

  // Initial/first page rendering
  renderPage(pageNum);
});

</script>