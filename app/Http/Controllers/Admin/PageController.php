<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\FormPageUpdate;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    const ITEM_PER_PAGE = 10;

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
     * @param null|string $id
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

        $record->save();

        return redirect('/admin/page/update/' . $record->id . '?success=true');
    }

    /**
     * Show page delete action
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector|string
     * @throws \Throwable
     */
    public function pageDeleteShow($id)
    {
        $page = Page::find($id);
        if (!$page) {
            return redirect('/admin/pages');
        }

        return view()->render('admin/page_delete', [
            'record' => $page
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function pageDeleteSend(Request $request, $id)
    {
        $page = Page::find($id);
        if (!$page) {
            return redirect('/admin/pages');
        }

        if ((bool)$request->input('submit', false)) {
            $page->delete();
        }

        return redirect('/admin/pages');
    }

}