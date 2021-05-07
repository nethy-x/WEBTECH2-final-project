<?php echo "
<div class='col-md-4'><label class='form-label' for='question5' >Otázka</label>
<input class='form-control' id='question5' type='text'>
<math-field id='mf' virtual-keyboard-mode='manual'>f(x)=</math-field>
<div id='output'></div>
</div>
<script type='module'>
    import {makeMathField} from 'https://unpkg.com/mathlive/dist/mathlive.min.mjs';
    document.getElementById('mf').addEventListener('input', (ev) => {
        document.getElementById('output').innerHTML = ev.target.getValue();
    });
</script>
<label for='submit-question5'></label>
    <button id='submit-question5' name='submit-question4' class='btn btn-dark' >Submit</button>
 <script src='otazka/script/question_5_script.js'></script>";
?>
