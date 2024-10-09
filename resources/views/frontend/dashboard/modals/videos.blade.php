
<!-- CREATE MODAL para videos -->
@foreach($videos as $video)
<div id="videoAulaModal{{$video->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90" onclick="closeModal({{$video->id}})">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100" onclick="event.stopPropagation();">
        <!-- Botão para fechar -->
        <button class="absolute modal-close top-4 right-4 text-gray-500 hover:text-gray-700" aria-label="Close" onclick="closeModal({{$video->id}})">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        
        <!-- Título do vídeo -->
        <h4 class="text-xl font-semibold text-[#798100] mb-4">{{$video->title}}</h4>
        
        <!-- Vídeo embutido -->
        <div class="embed-responsive embed-responsive-16by9 px-6 py-5">
            <iframe id="videoIframe{{$video->id}}" class="embed-responsive-item w-full h-[320px]"
                src="https://www.youtube.com/embed/{{$video->id_video}}?enablejsapi=1"
                allowfullscreen></iframe>
            <div class="flex flex-col">
                <label><strong>Descrição:</strong></label>
                {!! $video->description !!}
            </div>
        </div>
        
        <!-- Botão de fechar no rodapé -->
        <div class="modal-footer pt-5">
            <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400" onclick="closeModal({{$video->id}})">
                Fechar
            </button>
        </div>
    </div>
</div>
@endforeach


<script>
    // Função para fechar o modal e parar o vídeo
    function closeModal(videoId) {
        // Seleciona o modal e o iframe do vídeo
        var modal = document.getElementById('videoModal' + videoId) || document.getElementById('videoAulaModal' + videoId);
        var iframe = document.getElementById('videoIframe' + videoId);

        if (modal) {
            // Fecha o modal removendo as classes de visibilidade
            modal.classList.add('opacity-0', 'pointer-events-none');
            modal.classList.remove('opacity-100', 'pointer-events-auto');

            if (iframe) {
                iframe.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*');
            }
        }
    }
</script>
