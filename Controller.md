<?php

namespace App\Http\Controllers;

use App\Constants;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;

    protected array $breadcrumbs = [];

    protected string $pageTitle = '';

    protected array $headers = [];

    protected bool $showFloorSettingModal = true;

    protected function responseSuccess($data, int $statusCode = ResponseAlias::HTTP_OK): JsonResponse
    {
        return response()->json($data, $statusCode);
    }

    protected function responseError(?string $message = null, int $statusCode = ResponseAlias::HTTP_NOT_FOUND): JsonResponse
    {
        if (! $message) {
            $message = __('message.not_found');
        }

        return response()->json([
            'message' => $message,
        ], $statusCode);
    }

    /**
     * @return Controller
     */
    protected function setBreadcrumbs(string $label, ?string $url = null, array $params = []): static
    {
        $this->breadcrumbs[] = ['label' => $label, 'url' => $url, 'params' => $params];

        return $this;
    }

    protected function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }

    /**
     * @return Controller
     */
    protected function setTitle(string $title): static
    {
        $services = auth()->user()?->services ?? Constants::SERVICE_MEDI;

        $app = config('app.name');
        if ($services === Constants::SERVICE_HOME_CARE) {
            $app = config('app.name_home_care');
        }
        $this->pageTitle = __('data.common.meta_title', ['app' => $app, 'page' => $title]);

        return $this;
    }

    protected function getTitle(): string
    {
        return $this->pageTitle;
    }

    protected function setHeaders(array $columns): void
    {
        $this->headers = $columns;
    }

    protected function renderView(string $view, array $data = [])
    {
        return view($view, array_merge($data, [
            'title' => $this->pageTitle,
            'breadcrumbs' => $this->breadcrumbs,
            'showFloorSettingModal' => $this->showFloorSettingModal,
        ]));
    }
}
