@extends('layouts.master')

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('content')
    <x-page-title title="Lista de Usuários" pagetitle="Usuários" />

    {{--DataTable  --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Usuários</h6>
            <div id="hoverableTable_wrapper" class="dataTables_wrapper dt-tailwindcss no-footer"><div class="grid grid-cols-12 lg:grid-cols-12 gap-3">
                <div class="self-center col-span-12 lg:col-span-6">
                    <div class="dataTables_length" id="hoverableTable_length">
                        <label>Show
                            <select name="hoverableTable_length" aria-controls="hoverableTable" class="px-3 py-2 form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 inline-block w-auto">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label>
                        </div>
                    </div>

                    <div class="self-center col-span-12 lg:col-span-6 lg:place-self-end">
                        <div id="hoverableTable_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200 inline-block w-auto ml-2" placeholder="" aria-controls="hoverableTable">
                            </label>
                        </div>
                    </div>

                    <div class="my-2 col-span-12 overflow-x-auto lg:col-span-12">
                        <table id="hoverableTable" class="hover group dataTable w-full text-sm align-middle whitespace-nowrap no-footer" style="width: 100%;" aria-describedby="hoverableTable_info">
                           
                            <thead class="border-b border-slate-200 dark:border-zink-500">
                                <tr>
                                    <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500 sorting_asc" tabindex="0" aria-controls="hoverableTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 265px;">
                                    Nome
                                    </th>
                                    <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="hoverableTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 398px;">
                                        E-mail
                                    </th>
                                    <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="hoverableTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 212px;">
                                        Cód País
                                    </th>
                                    <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="hoverableTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 102px;">
                                        Telefone
                                    </th>
                                    <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="hoverableTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 187px;">
                                        CPF
                                    </th>
                                    <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="hoverableTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 155px;">
                                        Plano
                                    </th>
                                    <th class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting px-3 py-4 text-slate-900 bg-slate-200/50 font-semibold text-left dark:text-zink-50 dark:bg-zink-600 dark:group-[.bordered]:border-zink-500" tabindex="0" aria-controls="hoverableTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 155px;">
                                        Ações
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user as $usuario)
                                    <tr class="group-[.stripe]:even:bg-slate-50 group-[.stripe]:dark:even:bg-zink-600 transition-all duration-150 ease-linear group-[.hover]:hover:bg-slate-50 dark:group-[.hover]:hover:bg-zink-600 [&amp;.selected]:bg-custom-500 dark:[&amp;.selected]:bg-custom-500 [&amp;.selected]:text-custom-50 dark:[&amp;.selected]:text-custom-50">
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">{{$usuario->name}}</td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">{{$usuario->email}}</td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">{{$usuario->country_code}}</td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">{{$usuario->phone}}</td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">{{$usuario->cpf}}</td>
                                        <td class="p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">{{$usuario->plan}}</td>
                                        <td class="flex space-x-2 p-3 group-[.bordered]:border group-[.bordered]:border-slate-200 group-[.bordered]:dark:border-zink-500 sorting_1">
                                            <button type="button" title="Ações" class="flex items-center justify-center w-6 h-6 p-0 text-white btn bg-yellow-500 border-yellow-500 hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/20">
                                                <i data-lucide="alert-circle" class="w-4"></i>
                                            </button>
                                            <button type="button" title="Ações" class="flex items-center justify-center w-6 h-6 p-0 text-white btn bg-yellow-500 border-yellow-500 hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/20">
                                                <i data-lucide="alert-circle" class="w-4"></i>
                                            </button>
                                            <button type="button" title="Inativar Usuário" class="flex items-center justify-center w-6 h-6 p-0 text-white btn bg-red-500 border-red-500 hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
                                                <i data-lucide="alert-circle" class="w-4"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="self-center col-span-12 lg:col-span-6">
                        <div class="dataTables_info" id="hoverableTable_info" role="status" aria-live="polite">
                            Showing 1 to 8 of 8 entries
                        </div>
                    </div>

                    <div class="self-center col-span-12 lg:place-self-end lg:col-span-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="hoverableTable_paginate">
                            <div class="text-center dark:text-slate-100">
                                <a aria-controls="hoverableTable" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="relative inline-flex justify-center items-center space-x-2 border px-4 py-2 -mr-px leading-6 hover:z-10 focus:z-10 active:z-10 border-slate-200 active:border-slate-200 active:shadow-none dark:border-zink-500 dark:active:border-zink-400 bg-white dark:bg-zink-700 text-slate-300 dark:text-slate-300 rounded-l-lg" id="hoverableTable_previous">
                                    Previous
                                </a>

                                <a href="#" aria-controls="hoverableTable" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="relative inline-flex justify-center items-center space-x-2 border px-4 py-2 -mr-px leading-6 hover:z-10 focus:z-10 active:z-10 border-slate-200 active:border-slate-200 active:shadow-none dark:border-zink-500 dark:active:border-zink-400 font-semibold bg-slate-100 dark:bg-zink-600 text-slate-800 hover:text-slate-900 hover:border-slate-200 hover:shadow-sm focus:ring focus:ring-slate-300 focus:ring-opacity-25 dark:text-slate-100 dark:hover:border-zink-500 dark:hover:text-zink-50 dark:focus:ring-zink-500 dark:focus:ring-opacity-40">
                                    1
                                </a>
                                <a aria-controls="hoverableTable" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="relative inline-flex justify-center items-center space-x-2 border px-4 py-2 -mr-px leading-6 hover:z-10 focus:z-10 active:z-10 border-slate-200 active:border-slate-200 active:shadow-none dark:border-zink-500 dark:active:border-zink-400 bg-white dark:bg-zink-700 text-slate-300 dark:text-slate-300 rounded-r-lg" id="hoverableTable_next">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
