@extends('theme.layout.frontend.main')

@section('content')
    <div class="main-section">
        <div class="main-container _1 w-container">
            {{ Breadcrumbs::render('course_detail', $detail[0]->mSchool->mSchooltranslations[0]->name , $detail[0]->mSchool->mSchooltranslations[0]->slug , $detail[0]->mSchoolcoursetranslations[0]->name_class,$detail[0]->slug) }}
            <div class="div-block-2-column unset-background">
                <div class="row w-100">
                    <div class="col-9">
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-12">
                            <div class="div-block-2-column-2-copy-copy w-100 h-100 text-justify"
                                style="unset:margin;background-color:#fff; padding:10px;margin-top:-1px;margin: 0px;">
                                <div class="div-block-1205">
                                    <div class="div-block-1283">
                                        <div class="div-block-1282">
                                            <h1 class="heading-title-2">
                                                <strong class="bold-text-28">
                                                <a href="{{asset($detail[0]->slug)}}"> {{$detail[0]->mSchoolcoursetranslations[0]->name_class}} </a>
                                                </strong>
                                            </h1>
                                        </div>
                                    </div>
                                </div>                      
                                    {!! $detail[0]->mSchoolcoursetranslations[0]->content !!}                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        @include('theme.frontend.section.promotion.ads')
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="section-email-enter">
        <div class="container w-container">
            @include('theme.frontend.section.homepage.subscribe')
        </div>
    </div>
@endsection