@extends('layouts.master')
@section('title')
    Notificações
@endsection
@push('css')
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    
    {{-- <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/classic.min.css') }}"> --}}
@endpush
@section('content')
<!-- page title -->
    <x-page-title title="Notificações" pagetitle="Notificações" />

    {{-- Lista de Catagorias --}}
    <div class="card" id="customerList">
        <div class="card-body">
            <div class="grid grid-cols-1 gap-5 mb-5 xl:grid-cols-2">
                <div>
                    <div class="relative xl:w-3/6">
                        <input type="text"
                            class="ltr:pl-8 rtl:pr-8 search input-text"
                            placeholder="Pesquisar Categoria ..." autocomplete="off">
                        <i data-lucide="search"
                            class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                    </div>
                </div>
                <div class="ltr:md:text-end rtl:md:text-start">
                    <button type="button" data-modal-target="showModal"
                        class="btn-add"
                        data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i
                            class="align-bottom ri-add-line me-1"></i> Add Categoria</button>
                    <button type="button"
                        class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20"
                        onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap" id="customerTable">
                    <thead class="bg-slate-100 dark:bg-zink-600">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500"
                                scope="col" style="width: 50px;">
                                <input
                                    class="size-4 border rounded-sm appearance-none cursor-pointer bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                    type="checkbox" id="checkAll" value="option">
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="customer_name">
                                Título
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="email">
                                Texto
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="phone">
                                Status
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="phone">
                                Dispositivos
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="action">
                                Data
                            </th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @foreach ($notificacoes as $notif)                        
                            <tr>
                                <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                                    <input
                                        class="size-4 border rounded-sm appearance-none cursor-pointer bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                        type="checkbox" name="chk_child">
                                </th>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" >
                                    {{$notif->get('notification_title')}}
                                </td>
                                
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">
                                    {{-- exite o texto limitando a 50 caracteres adicionando ... caso atinja --}}
                                    {{strlen($notif->get('notification_text')) > 50 ? substr($notif->get('notification_text'), 0, 50) . '...' : $notif->get('notification_text')}}
                                    
                                </td>
                            
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">
                                    @if($notif->get('status') == 'started')
                                        Pendente
                                    @elseif($notif->get('status') == 'succeeded')
                                        Enviado
                                    @endif
                                </td>

                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">
                                    @if($notif->get('target_audience') == 'All')
                                        Todos
                                    @elseif($notif->get('target_audience') == 'Android')
                                        Android
                                    @elseif($notif->get('target_audience') == 'iOS')
                                        iOS
                                    @endif
                                    
                                </td>
                                {{-- @dd($notif->getCreatedTime('timestamp')) --}}
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    {{formataDataHora($notif->getCreatedTime('timestamp'))}}

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <div class="noresult" style="display: none">
                    <div class="text-center p-7">
                        <h5 class="mb-2">Sorry! No Result Found</h5>
                        <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 150+ Orders We did not
                            find any orders for you search.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <div class="flex gap-2 pagination-wrap">
                    <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev disabled pagination-prev disabled"
                        href="#">
                        Anterior
                    </a>
                    <ul class="flex gap-2 mb-0 pagination listjs-pagination"></ul>
                    <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev disabled pagination-next"
                        href="#">
                        Próximo
                    </a>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Add --}}
    <div id="showModal" modal-center
        class="fixed hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
                <h5 class="text-16" id="exampleModalLabel">Add Categoria</h5>
                <button data-modal-close="showModal"
                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i data-lucide="x"
                        class="size-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
                <form class="tablelist-form" method="POST" action="{{urL('addOrEditCategory')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3" id="modal-id" style="display: none;">
                        <label for="id_cat" class="inline-block mb-2 text-base font-medium">ID</label>
                        <input type="text" id="id_cat"
                            class="input-text"
                            placeholder="ID" readonly="">
                    </div>
                    <div class="mb-3">
                        <label for="customername-field" class="inline-block mb-2 text-base font-medium">Título
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="titulo" name="titulo"
                            class="input-text"
                            placeholder="Digite o ítulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="email-field" class="inline-block mb-2 text-base font-medium">
                            Icone <span class="text-red-500">*</span>
                        </label>
                        <div>
                            <input type="file" id="icone" name="icone"
                                class="cursor-pointer form-file form-file-sm border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                                placeholder="Imagem">
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" data-modal-close="showModal"
                            class="btn-cancel
                            data-modal-close="showModal">Cancelar</button>
                        <button type="submit" data-modal-close="showModal"
                            class="btn-submit"
                            id="add-btn">Add Categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <!-- list js-->
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush


<script>
    // $(document).ready(function() {
    //     // $('#hoverableTable').dataTables()
    // });
</script>