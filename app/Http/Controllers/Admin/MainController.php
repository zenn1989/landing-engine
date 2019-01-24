<?php

namespace App\Http\Controllers\Admin;


use App\Backcalls;
use App\Http\Controllers\Controller;
use App\Model\FormAdminSettings;
use App\Model\FormPageUpdate;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class MainController
 * @package App\Http\Controllers\Admin
 */
class MainController extends Controller
{
    const ITEM_PER_PAGE = 10;

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function index(Request $request): ?string
    {
        $page = (int)$request->query->get('page', 0);
        $offset = $page * static::ITEM_PER_PAGE;

        // get records from "callback me now"
        $records = Backcalls::orderBy('id', 'DESC')
            ->skip($offset)
            ->take(10)
            ->get();

        return view()->render('admin/index', [
            'records' => $records,
            'pagination' => [
                'page' => $page,
                'total' => Backcalls::count(),
                'step' => static::ITEM_PER_PAGE
            ]
        ]);
    }

    /**
     * Close back call request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function close(string $id)
    {
        $record = Backcalls::find($id);
        if ($record) {
            $record->status = 1;
            $record->updated_at = time();
            $record->save();
        }

        return redirect('/admin');
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function pageList(Request $request)
    {
        $page = (int)$request->query->get('page', 0);
        $offset = $page * static::ITEM_PER_PAGE;

        $records = Page::orderBy('id', 'DESC')
            ->take(static::ITEM_PER_PAGE)
            ->skip($offset)
            ->get();

        return view()->render('admin/page_list', [
            'records' => $records,
            'pagination' => [
                'page' => $page,
                'total' => Page::count(),
                'step' => static::ITEM_PER_PAGE
            ]
        ]);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return string
     * @throws \Throwable
     */
    public function pageUpdateShow(Request $request, $id = null)
    {
        $record = Page::findOrNew($id);
        $model = new FormPageUpdate($record);

        $updated = (bool)$request->query->get('success', false);

        return view()->render('admin/page_update', [
            'record' => $record,
            'model' => $model,
            'updated' => $updated
        ]);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function pageUpdateSend(Request $request, $id = null)
    {
        /** @var Page $record */
        $record = Page::findOrNew($id);
        $model = new FormPageUpdate($record);

        $text = (string)$request->input($model->getFormName() . '.text');
        $route = (string)$request->input($model->getFormName() . '.route');
        $tpl = (string)$request->input($model->getFormName() . '.tpl');

        $seoTitle = (string)$request->input($model->getFormName() . '.seoTitle');
        $seoDesc = (string)$request->input($model->getFormName() . '.seoDesc');
        $seoKeywords = (string)$request->input($model->getFormName() . '.seoKeywords');

        if (!$route || !starts_with($route, '/') || (Page::where('route', $route)->count() > 0 && (int)$record->id < 1)) {
            return redirect('/admin/page/update/' . $record->id . '?fail=true');
        }

        $record->route = $route;
        $record->tpl = $tpl;
        $record->text = $text;
        $record->seo_title = $seoTitle;
        $record->seo_keywords = $seoKeywords;
        $record->seo_description = $seoDesc;
        //$record->created_at = time();
        //$record->updated_at = time();

        $record->save();

        return redirect('/admin/page/update/' . $record->id . '?success=true');
    }

    /**
     * Render settings page
     * @return string|null
     * @throws \Throwable
     */
    public function settingsShow()
    {
        $model = new FormAdminSettings();

        return view()->render('admin/settings', [
            'model' => $model
        ]);
    }

    /**
     * Post form route, save settings. Sh@t code inside!
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function settingsSave(Request $request)
    {
        $model = new FormAdminSettings();
        $env = file_get_contents(base_path('.env'));
        $lines = explode("\n", $env);

        $result = '';
        foreach ($lines as $line) {
            if (starts_with($line, 'APP_ENV')) {
                $result .= 'APP_ENV=' . $request->input($model->getFormName() . '.appEnv');
            } elseif (starts_with($line, 'APP_DEBUG')) {
                $result .= 'APP_DEBUG=' . ((bool)$request->input($model->getFormName() . '.appDebug', false) ? 'true' : 'false');
            } elseif (starts_with($line, 'APP_URL')) {
                $result .= 'APP_URL=' . $request->input($model->getFormName() . '.appUrl');
            } elseif (starts_with($line, 'APP_TEMPLATE')) {
                $result .= 'APP_TEMPLATE=' . $request->input($model->getFormName() . '.appTemplate');
            } elseif (starts_with($line, 'APP_ONEPAGE')) {
                $result .= 'APP_ONEPAGE=' . ((bool)$request->input($model->getFormName() . '.appOnepage', false) ? 'true' : 'false');
            } elseif (starts_with($line, 'APP_RECATCHA_PUBLIC')) {
                $result .= 'APP_RECATCHA_PUBLIC=' . $request->input($model->getFormName() . '.appCatchaPublic');
            } elseif (starts_with($line, 'APP_RECATCHA_SECRET')) {
                $result .= 'APP_RECATCHA_SECRET=' . $request->input($model->getFormName() . '.appCatchaPrivate');
            } else if (starts_with($line, 'SEO_OP_TITLE')) {
                $result .= 'SEO_OP_TITLE="' . $request->input($model->getFormName() . '.seoOpTitle') . '"';
            } else if (starts_with($line, 'SEO_OP_DESC')) {
                $result .= 'SEO_OP_DESC="' . $request->input($model->getFormName() . '.seoOpDesc') . '"';
            } else if (starts_with($line, 'SEO_OP_KEYWORDS')) {
                $result .= 'SEO_OP_KEYWORDS="' . $request->input($model->getFormName() . '.seoOpKeywords') . '"';
            }
            else {
                $result .= $line;
            }
            $result .= "\n";
        }

        @file_put_contents(base_path('.env'), $result);
        sleep(1);
        return redirect('/admin/settings');
    }
}