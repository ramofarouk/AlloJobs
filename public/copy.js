<div id="app" v-cloak>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-control wizard-form-control d-flex align-items-center testing-code px-20px mb-10px">
                    <span class="title">Testing Code:</span>
                    <span class="code text-red">{{ testingCode }}</span>
                    <span class="btn btn-info text-white copy-btn ml-auto" @click.stop.prevent="copyTestingCode">
              Copy
            </span>
                    <input type="hidden" id="testing-code" :value="testingCode">
                </div>
            </div>
        </div>
    </div>
</div>



new Vue({
    el: "#app",
    data: {
        testingCode: "1234",
    },
    methods: {
        copyTestingCode () {
          let testingCodeToCopy = document.querySelector('#testing-code')
          testingCodeToCopy.setAttribute('type', 'text')    // 不是 hidden 才能複製
          testingCodeToCopy.select()

          try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            alert('Testing code was copied ' + msg);
          } catch (err) {
            alert('Oops, unable to copy');
          }

          /* unselect the range */
          testingCodeToCopy.setAttribute('type', 'hidden')
          window.getSelection().removeAllRanges()
        },
    },
    
});
