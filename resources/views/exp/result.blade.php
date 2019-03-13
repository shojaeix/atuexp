<?php
/**
 * Created by PhpStorm.
 * User: Amin
 * Date: 13/03/2019
 * Time: 22:23
 */
?>
@if($is_exp_complete)
متشکریم که در این نظرسنجی شرکت کردید.
@else

آخرین مرحله تکمیل شده:
{{ $exp->last_complete_step }}
@endif
