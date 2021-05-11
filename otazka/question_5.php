<div class='col-md-4'>
    <label class='form-label' for='question5_1'>Otázka</label>
    <input class='form-control question5' id='question5_1' type='text'>

    <label class='form-label' for='mf_question5_1'>Príklad</label>
    <math-field class="mf_question5" id='mf_question5_1' virtual-keyboard-mode='manual'>f(x)=</math-field>

    <div class="question5_output" id='question5_1_output'></div>
</div>
<script type='module'>

    document.getElementById('mf_question5_1').addEventListener('input', (ev) => {
        console.log(ev.target.getValue());
        document.getElementById('question5_1_output').innerHTML = ev.target.getValue();
    });
</script>




