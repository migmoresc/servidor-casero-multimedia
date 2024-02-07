<div class="form_report text-right m-8">
    <span id="reportar" class="m-8" tabindex="15">{{ __('messages.report') }}</span>
    <form id="form_reporte" action="{{ route('reportar.mensaje') }}">
        @csrf
        <label for="mensaje" tabindex="27" class="f-s-24">{{ __('messages.message_for_admin') }}</label>
        <textarea class="b-s-1-b ancho-100" name="mensaje" id="mensaje" class="bloque ancho-100 m-t-8" cols="30"
            rows="10" tabindex="28" required></textarea>
        <input type="submit" class="boton m-t-16 f-s-16" value="{{ __('messages.send') }}" tabindex="29">
        <input id="form_reporte_atras" class="boton m-t-16 f-s-16" type="button" value="{{ __('messages.back') }}"
            tabindex="30"><br>
        <span class="m-t-16 d-i-b" id="respuesta"></span>
    </form>
</div>
