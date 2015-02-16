<?php namespace Suggestotron;

/**
 * base controller
 */
class Controller
{

    /**
     * @var Config $config
     */
    protected $config;

    /**
     * @var Template $template
     */
    protected $template;

    public function __construct()
    {
        $this->config = \Suggestotron\Config::get('site');
        $this->template = new \Suggestotron\Template($this->config['view_path'] . '/base.phtml');
    }

    /**
     * Render Template
     *
     * @param string $template
     * @param array $data
     */
    protected function render($template, $data = [])
    {
        $this->template->render($this->config['view_path'] . '/' . $template, $data);
    }
}
