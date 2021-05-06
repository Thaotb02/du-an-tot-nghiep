    @extends ('layout-client')
    @section('content')
    <base href="{{asset('')}}">
    <main>
        <div class="main-wrapper p-0">
            <section class="section section-home-banner mb-0 fadeIn">
                <div class="slider-wrapper">
                    <a href="">
                        <div class="item">
                            <div class="slider-img">
                                <img src="{{asset('assets/client/images/slider21.jpg')}}" alt="">
                            </div>

                            <div class="container content">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                            <div class="container indicator"></div>
                        </div>
                    </a>
                    <a href="">
                        <div class="item ">
                            <div class="slider-img">
                                <img src="{{asset('assets/client/images/slider2.jpg')}}" alt="">
                            </div>

                            <div class="container content">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                            <div class="container indicator"></div>
                        </div>
                    </a>
                </div>
            </section>
            <section class="section section-home-services">
                <div class="container-fluid">
                    <div class="text-center">
                        <div class="section-title">Các dịch vụ của chúng tôi</div>
                        <h1 class="sub-description mx-auto seo-desc">
                            Luyện tập tại HKC Fitness - Kickfit & Yoga sẽ giúp bạn đạt được mục tiêu sức khỏe và hình
                            thể.
                        </h1>
                    </div>
                    <div class="services-wrapper">
                        <div class="row">
                            @foreach ($subjects as $sub)
                            <div class="col-xl-4 col-lg-6 col-md-4 sm-pd">
                                <a href="{{route('client.detail-subject',['id'=> $sub->id])}}" class="item">
                                    <div class="item-img">
                                        <img class="img-mobile" src="{{$sub->image}}" />
                                    </div>
                                    <div class="content-overlay">
                                        <div class="content">
                                            <div class="title">{{$sub->subject_name}}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <section data-desktop-src="background: url();
            background-size: cover;" data-mobile-src="background: url(); background-size: cover;"
                class="section section-home-news stripe-section  url-mobile">
                <div class="stripe-vector-1">
                    <img src="" />
                </div>
                <div class="stripe-vector-2">
                    <img src="" />
                </div>
                <div class="container">
                    <div class="text-center">
                        <div class="section-title light">Tin tức về chúng tôi</div>
                        <h2 class="sub-description mx-auto seo-desc">
                            HKC Fitness - Kickfit & Yoga dùng toàn bộ nỗ lực để giúp bạn yêu cơ thể mình hơn, đều đặn
                            mỗi ngày.
                        </h2>
                    </div>
                    <div class="news-wrapper">
                        <div class="slider-wrapper">
                            @foreach($bloghome as $item)
                            <div class="item">
                                <a class="item-img d-block" href="{{route('client.detailblog',['id'=> $item->id])}}">
                                    <img src="{{$item->featured_image}}" class="content" />
                                </a>
                                <a href="{{route('client.detailblog',['id'=> $item->id])}}"
                                    class="title">{{$item->title}}</a>
                                <div class="item-description"
                                    style="width: 300px;overflow: hidden;text-overflow: ellipsis;line-height: 20px;-webkit-line-clamp: 5;display: -webkit-box;-webkit-box-orient: vertical;">

                                    {!! $item->content !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <section class="section section-home-before-after ">
                <div class="container">
                    <div class="before-after-wrapper">
                        <div class="row align-items-center">
                            <div class="col-lg-6 m-b-md-3">
                                <div class="section-title"> LỢI ÍCH CỦA KHÁCH HÀNG KHI TẬP LUYỆN TẠI HKCFITNESS</div>
                                <p class="m-b-3">
                                    Không gian luyện tập thân thiện, thoáng mát tại tầng 3 có nhiều cửa sổ và ban công
                                    lớn giúp bạn thích thú trong khi tập luyện.
                                    Mỗi học viên của HKCfitness đều được xây dựng giáo trình tập luyện và dinh dưỡng
                                    riêng để có thể đạt được hiệu quả cao nhất.
                                    Đội ngũ huấn luyện viên có trình độ cao, được đào tạo kỹ năng chuyên nghiệp, thái độ
                                    tận tình với từng học viên.
                                </p>
                            </div>
                            <div class="col-lg-6 comparison-slider-wrapper">
                                <div class="slider-wrapper skip-lazy">
                                    <img src="{{asset('assets/client/images/tt.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <section class="section section-home-bmi pt-64">
            <div class="container">
                <div class="bmi-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6 background-image m-b-md-5">
                            <img class="img-mobile item-image img-home-bmi"
                                data-desktop-src="{{asset('assets/client/images/bmi-text.png')}}"
                                data-mobile-src="{{asset('assets/client/images/bmi-text-mobile.png')}}" />
                        </div>
                        <div class="col-lg-6 bmi-content">
                            <div class="section-title">Tính BMI (Chỉ số khối cơ thể)</div>
                            <h3 class="seo-desc">
                                HKC Fitness hỗ trợ hội viên đo các chỉ số BMI để đưa ra các giải
                                pháp về chương trình tập luyện
                            </h3>
                            <p class="form-group">
                                HKC Fitness hỗ trợ hội viên đo chỉ số BMI trước và trong quá
                                trình tập luyện để hội viên có thể theo dõi được kết quả tập
                                luyện. BMI là chỉ số khối cơ thể (Body Mass Index), được các
                                bác sĩ và chuyên gia sức khỏe dùng để xác định một người có
                                bị béo phì, thừa cân hay quá gầy. Hãy để lại thông tin để
                                HKC Fitness có thể giúp bạn phân tích sức khỏe và đưa ra những
                                tư vấn phù hợp với thể trạng của bạn.
                            </p>
                            <form method="GET" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="height" name="height"
                                                placeholder="Chiều cao / cm" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="weight" name="weight"
                                                placeholder="Cân nặng / kg" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h2 id="yourNumb"></h2>
                                        <h3 id="rating"></h3>
                                        <p id="info"></p>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" onclick="calculate()" class="btn btn-brand">
                                            Nhận kết quả
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </main>
    <script>
// calculates bmi from user input
function calculate(height, weight) {
    var height = document.getElementById("height").value
    var weight = document.getElementById("weight").value
    var bmindex = Math.round(10 * weight / Math.pow(height / 100, 2)) / 10;
    // display bmi on page
    var yourNumb = document.getElementById("yourNumb")
    yourNumb.innerHTML = "Chỉ số cơ thể của bạn là : " + bmindex.toFixed(2)
    // gives different message based on range of bmi
    var info = document.getElementById("info")
    var rating = document.getElementById("rating")
    if (bmindex <= 18.5) {
        rating.innerHTML = "Thiếu cân"
        info.innerHTML =
            "Chỉ số BMI gầy có thể chỉ ra rằng cân nặng của bạn có thể quá thấp. Bạn nên tham khảo ý kiến ​​bác sĩ để xác định xem mình có nên tăng cân hay không, vì khối lượng cơ thể thấp có thể làm giảm hệ thống miễn dịch của cơ thể, dẫn đến các bệnh như mất kinh (phụ nữ), mất xương, suy dinh dưỡng và các bệnh khác. Chỉ số BMI của bạn càng thấp thì những rủi ro này càng lớn."
    } else if (bmindex > 18.5 && bmindex < 25) {
        rating.innerHTML = "Cân nặng bình thường"
        info.innerHTML =
            "Những người có chỉ số BMI trong khoảng 18,5 đến 24,9 có trọng lượng cơ thể lý tưởng, liên quan đến việc sống lâu nhất, tỷ lệ mắc bệnh hiểm nghèo thấp nhất, cũng như được coi là hấp dẫn về thể chất hơn những người có chỉ số BMI trong phạm vi cao hơn hoặc thấp hơn. Tuy nhiên, bạn nên kiểm tra Vòng eo của mình và giữ nó trong giới hạn khuyến nghị"
        rating.innerHTML = "Overweight"
        info.innerHTML =
            "Những người giảm trong phạm vi BMI này được coi là thừa cân và sẽ có lợi khi tìm ra những cách lành mạnh để giảm cân chẳng hạn như ăn kiêng và tập thể dục.Những người rơi vào phạm vi này có nguy cơ mắc nhiều bệnh khác nhau.Nếu chỉ số BMI của bạn là 27 - 29, 99, nguy cơ mắc các vấn đề sức khỏe của bạn trở nên cao hơn.Trong một nghiên cứu gần đây, tỷ lệ tăng huyết áp, tiểu đường và bệnh tim được ghi nhận là 27,3 đối với phụ nữ và 27, 8 đối với nam giớ .Có thể là một ý kiến​​ hay khi kiểm tra Vòng eo của bạn và so sánh với giới hạn được đề nghị "
    } else if (bmindex > 29.99 && bmindex < 35) {
        rating.innerHTML = "Thừa cân"
        info.innerHTML =
            "Individuals with a BMI of 30-34.99 are in a physically unhealthy condition, which puts them at risk for serious ilnesses such as heart disease, diabetes, high blood pressure, gall bladder disease, and some cancers. This holds especially true if you have a larger than recommended Waist Size. These people would benefit greatly by modifying their lifestyle. Ideally, see your doctor and consider reducing your weight by 5-10 percent. Such a weight reduction will result in considerable health improvements."
    } else if (bmindex > 34.99 && bmindex < 40) {
        rating.innerHTML = "Béo phì (Nhóm 2)"
        info.innerHTML =
            "Nếu bạn có chỉ số BMI từ 35-39,99, nguy cơ mắc các vấn đề sức khỏe liên quan đến cân nặng và thậm chí tử vong là rất nghiêm trọng. Hãy đến gặp bác sĩ và giảm cân để chỉ số BMI thấp hơn."
    } else if (bmindex >= 40) {
        rating.innerHTML = "Bệnh béo phì"
        info.innerHTML =
            "Với chỉ số BMI trên 40, bạn có nguy cơ rất cao mắc các bệnh liên quan đến cân nặng và tử vong sớm. Thật vậy, bạn có thể đã bị một tình trạng liên quan đến cân nặng. Vì lợi ích của sức khỏe của bạn, điều rất quan trọng là phải đến gặp bác sĩ và nhận được sự giúp đỡ của các chuyên gia về tình trạng của bạn."
    }
}
    </script>
    @endsection