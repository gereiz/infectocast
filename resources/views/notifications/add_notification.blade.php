    {{-- Modal Add --}}
    <div id="showModal" modal-center
        class="fixed hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16" id="exampleModalLabel">Nova Notificação</h5>
                <button data-modal-close="showModal"
                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i data-lucide="x"
                        class="size-5"></i></button>
            </div> 
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
                <form class="tablelist-form" id="form_notif" method="POST" action="{{url('sendNotification')}}">
                    @csrf

                    <div class="mb-3" id="modal-id" style="display: none;">
                        <label for="id_cat" class="inline-block mb-2 text-base font-medium">ID</label>
                        <input type="text" id="id_cat"
                            class="input-text"
                            placeholder="ID" readonly="">
                    </div>
                    <div class="w-full flex items-center mb-3">
                        <div class="w-6/12 me-4">
                            <label for="customername-field" class="inline-block mb-2 text-base font-medium">
                                Título <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="titulo" name="titulo"
                                class="input-text"
                                placeholder="Digite o Título">
                        </div>

                        <div class="w-4/12">
                            <label for="dispositivos" class="inline-block mb-2 text-base font-medium">
                                Dispositivos <span class="text-red-500">*</span>
                            </label>
                            <div>
                                <select id="dispositivos" name="dispositivos"
                                    class="input-text">
                                    <option value="0" selected disabled>Selecione</option>
                                    <option value="1">Android</option>
                                    <option value="2">Ios</option>
                                    <option value="3">Todos</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6 class="mb-4 text-15">Texto</h6>
                        <textarea class="w-full text-slate-800 border border-gray-200 px-2" 
                                  rows="5" id="content_notif" 
                                  name="content_notif" 
                                  placeholder="Insira uma descrição curta aqui!."></textarea> 
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" data-modal-close="showModal"
                            class="btn-cancel"
                            data-modal-close="showModal">
                            Cancelar
                        </button>
                        <button type="submit" 
                            class="btn-submit"
                            id="envia-btn">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>