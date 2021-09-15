
$(document).ready(function(){
    $("#test").click(function(){
        
    
            splitHTMLtoMultiPagePDF();
        
    });
});
function addHTMLToPDFPage() {

	var doc = new jsPDF('p', 'pt', [$("body").width(), $("body").height()]);
	
	converHTMLToCanvas($("#Milo")[0], doc, false, true);
	

}
function converHTMLToCanvas(element, jspdf, enableAddPage, enableSave) {
	html2canvas(element, { allowTaint: true }).then(function(canvas) {
		if(enableAddPage == true) {
			jspdf.addPage($("body").width(), $("body").height());
		}
		
		image = canvas.toDataURL('image/png', 1.0);
		jspdf.addImage(image, 'PNG', 15, 15, $(element).width(), $(element).height()); // A4 sizes
		
		if(enableSave == true) {
			jspdf.save("add-to-multi-page.pdf");
		}
	});
}
function test() {
// Get the element.
    var element = document.getElementById('Milo');
    var htmlWidth = $(".container").width();
    var htmlHeight = $(".container").height();
    var pdfWidth = htmlWidth + (15 * 2);
    var pdfHeight = (pdfWidth * 1.5) + (15 * 2);
    var pageCount = Math.ceil(htmlHeight / pdfHeight) - 1;
    // Generate the PDF.
    html2pdf().from(element).toCanvas('pdf').then(function (pdf) {
    
        for (var i = 1; i <= pageCount; i++) {
            pdf.addPage(pdfWidth, pdfHeight);
        
        }
    }).save('test.pdf');
    // return doc.output('tét');
}

function splitHTMLtoMultiPagePDF() {
    var htmlWidth = $(".container").width();
    var htmlHeight = $(".container").height();
    
    var pdfWidth = htmlWidth + (15 * 2);
    var pdfHeight = (pdfWidth * 1.5) + (15 * 2);
    
    var doc = new jsPDF('p', 'pt');

    var pageCount = Math.ceil(htmlHeight / pdfHeight) - 1;


    html2canvas($(".container"), { allowTaint: true  , scale : 1 , }).then(function(canvas) {
		canvas.getContext('2d');

		var image = canvas.toDataURL("image/png", 1.0);
		doc.addImage(image, 'PNG', 15, 15, htmlWidth, htmlHeight);
        doc.setFont('Arial')
        doc.setFontSize(5)

		for (var i = 1; i <= pageCount; i++) {
			doc.addPage(pdfWidth, pdfHeight);
			doc.addImage(image, 'PNG', 15, -(pdfHeight * i)+15, htmlWidth, htmlHeight);
		}

		doc.save("split-to-multi-page.pdf");
	});
};
