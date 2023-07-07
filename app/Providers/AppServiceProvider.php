<?php

namespace App\Providers;

use App\Like;
use App\Location;
use App\Setting;
use App\Category;
use App\Villa;
use App\Post;
use App\Article;
use App\User;
use App\Menu;
use App\Meta;
use App\About;
use App\ContactInfo;
use App\Contact;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $this->url = $request->fullUrl();
        Schema::defaultStringLength(191);
        Carbon::setLocale('fa');

        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        view()->composer('panel.particle.nav', function ($view) {
            $view->with('setting', Setting::latest()->first());
        });
        view()->composer('user.layouts.user', function ($view) {
            $seo = Meta::where('url', $this->url)->where('status','active')->first();
//            dd($seo);
            if (is_null($seo)) {
                $seo = Meta::where('url', $this->url . '/')->where('status','active')->first();
                if (is_null($seo)) {
                    $seo = Meta::where('url', explode('?', $this->url)[0])->where('status','active')->first();
                    if (is_null($seo)) {
                        $seo = Meta::where('url', explode('?', $this->url)[0] . '/')->first();
                    }
                }
            }
            if (!is_null($seo)) {
                $titleSeo = $seo->title;
                $keywordsSeo = $seo->key_word;
                $descriptionSeo = $seo->description;
            }
            else {
                $titleSeo ='خرید ملک در استانبول | خرید خانه در استانبول |استیت4استانبول';
                $keywordsSeo = 'خرید ملک در استانبول | خرید خانه در استانبول |استیت4استانبول';
                $descriptionSeo = 'خرید ملک در استانبول | خرید خانه در استانبول |استیت4استانبول';
            }
            $contact_provider=ContactInfo::first();
            $view
                ->with('urlPage', $this->url)
                ->with('contact_provider', $contact_provider)
                ->with('titleSeo', $titleSeo)
                ->with('keywordsSeo', $keywordsSeo)
                ->with('descriptionSeo', $descriptionSeo)
                ->with('about_footer', About::where('page','footer')->where('status','active')->first())
                ->with('menus', Menu::with('children')->where('parent_id',null)->orderBy('created_at','asc')->get())
                ->with('setting', Setting::latest()->first());
        });
      

        view()->composer('layouts.back', function ($view) {
            $pending_users = User::where('account_status','pending')->role(['مدیر ملک','مدیر ملک(برنزی)','کارشناس فروش'])->limit(5)->get();
            $view
                ->with('count_contact', Contact::count())
                ->with('count_consulting', Contact::count())
                ->with('pending_users', $pending_users);
        });

        view()->composer('layouts.frontend', function ($view) {
            $seo = Meta::where('url', $this->url)->where('status','active')->first();
//            dd($seo);
            if (is_null($seo)) {
                $seo = Meta::where('url', $this->url . '/')->where('status','active')->first();
                if (is_null($seo)) {
                    $seo = Meta::where('url', explode('?', $this->url)[0])->where('status','active')->first();
                    if (is_null($seo)) {
                        $seo = Meta::where('url', explode('?', $this->url)[0] . '/')->first();
                    }
                }
            }
            if (!is_null($seo)) {
                $titleSeo = $seo->title;
                $keywordsSeo = $seo->key_word;
                $descriptionSeo = $seo->description;
            }
            else {
                $titleSeo ='خرید خانه در استانبول';
                $keywordsSeo = 'مهاجرت، خرید ملک در استانبول';
                $descriptionSeo = 'مشاوره خرید ملک در اسنانبول';
            }
            $view
                ->with('titleSeo', $titleSeo)
                ->with('keywordsSeo', $keywordsSeo)
                ->with('descriptionSeo', $descriptionSeo);
        });

        view()->composer('layouts.front', function ($view) {
            $post_lastest = Post::where('status', 'published')->latest()->take(5)->get();
            $view->with(['locations' => Location::get(), 'post_lastest' => $post_lastest]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
