<div class="row">
    <div class="col-lg-12 bg-secondary">
        <div>
            <button onclick="generatePDF();">Click to Generate PDF</button>
            <button onclick="convert_HTML_To_PDF();">Convert HTML to PDF</button>
            <a href="./services/printtopdf/" class="btn btn-primary btn-sm">Out dav</a>
            <button class="btn btn-primary btn-print">
                <span>Print Dom</span>
            </button>
            <button class="btn btn-danger" id="download">Convert</button>
            <!-- HTML content for PDF creation -->
            <div style="background-color:lime;" id="first-page">
                <div class="container border p-4">
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint iusto nam minus consequatur vitae fugit, tenetur reprehenderit officiis deserunt quibusdam id adipisci delectus dolorum eveniet expedita dolores culpa excepturi voluptatem.
                    </p>
                </div>
            </div>
            <div id="content-id">
                <h1>What is Lorem Ipsum?</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                    book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
                    more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div id="elementH"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.btn-print').on('click', function(e){
            e.preventDefault();
            window.print();
            window.close();
        })
        $(document).bind("keyup keydown", function(e){
            if(e.ctrlKey && e.keyCode == 80){
                e.preventDefault();
                return false;
            }
        });
        $(document).on('keydown', function(e) {
            if((e.ctrlKey || e.metaKey) && (e.key === "p" || e.key === "c" || e.charCode === 16 || e.charCode === 112 || e.keyCode === 80) ){
                e.cancelBubble = true;
                e.preventDefault();
                e.stopImmediatePropagation();
            }  
        });
    })
</script>