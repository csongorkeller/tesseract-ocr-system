var globalVariable;
var select;

document.getElementById("runOCR").onclick = runningOCR;
const image = document.getElementById('fileElementId').files[0];
  console.log(image);

function runningOCR() {
var inp = document.getElementById('fileElementId');
for (var i = 0; i < inp.files.length; ++i) {
  var name = inp.files.item(i).name;
  var working_files = inp.files.item(i)
  //alert("here is a file name: " + name);
  runOCR(working_files);
}
}

/*window.onload = function () {
    select = document.getElementById('dropdown');
    console.log(select);
}*/

/*function changeHiddenInput(objDropDown) {
    console.log(objDropDown);
    var objHidden = document.getElementById("hiddenInput");
    objHidden.value = objDropDown.value;
    globalVariable = objHidden.value;
}*/

function runOCR(url) {
    Tesseract.recognize(url, {
    lang: globalVariable
})
         .then(function(result) {
            var appendingText = document.getElementById("TextArea")
                    //.innerText += result.text;
                    appendingText.innerHTML += result.text;
         }).progress(function(result) {
            document.getElementById("ocr_status")
                    .innerText = result["status"] + " (" +
                        (result["progress"] ) + " %)";
        });
}

$("#btn-save").click( function() {
  var text = $("#TextArea").val();
  var filename = $("#input-fileName").val()
  var blob = new Blob([text], {type: "text/plain;charset=utf-8"});
  saveAs(blob, filename+".txt");
});


//kép posztolása a kiválasztás mellé
{
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
}

//progressbar
var bar = new ProgressBar.Line(container, {
  strokeWidth: 4,
  easing: 'easeInOut',
  duration: 1400,
  color: '#FFEA82',
  trailColor: '#eee',
  trailWidth: 1,
  svgStyle: {width: '100%', height: '100%'},
  from: {color: '#FFEA82'},
  to: {color: '#ED6A5A'},
  step: (state, bar) => {
    bar.path.setAttribute('stroke', state.color);
  }
});

bar.animate(appendingText.progress);  // Number from 0.0 to 1.0

