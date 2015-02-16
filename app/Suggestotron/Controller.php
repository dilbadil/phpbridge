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

        // Create new Plates instance
        $this->template = new \League\Plates\Engine($this->config['view_path']);
    }

    /**
     * Render Template
     *
     * @param string $template
     * @param array $data
     */
    protected function render($template, $data = [])
    {
        // Render a template
        echo $this->template->render($template, $data);
    }

}
