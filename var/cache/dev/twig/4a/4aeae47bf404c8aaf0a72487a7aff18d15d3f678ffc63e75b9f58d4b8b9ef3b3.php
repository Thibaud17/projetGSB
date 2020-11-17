<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* home/index.html.twig */
class __TwigTemplate_75d25e6f035b9c16a2cb302e7de3ed647556d81eca180e83245826edd897fffd extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "GSB Utilitaire";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style>
    

<div class=\"example-wrapper\">
    <h1>Bienvenue sur l'utilitaire GSB</h1>
    <div style=\"text-align: center\">
\t\t\t\t<img class=\"img-fluid\" src=\"https://www.cabinetinfirmierdecines.fr/wp-content/uploads/2019/04/Quels-sont-les-plus-gros-laboratoires-pharmaceutiques-fran%C3%A7ais.jpg\" alt=\"laboratoire pharceutique\"  width=\"1500px\"  height=\"600px\"/>
\t\t\t</div>
\t\t\t<div>
\t\t\t\t<p>Lorem ipsum dolor sit amet, 
\t\t\t\tconsectetur adipiscing elit.
\t\t\t\tNullam quis nunc velit. 
\t\t\t\tSuspendisse lacinia tellus eget ante lobortis, 
\t\t\t\tet consectetur ante consequat. 
\t\t\t\tAliquam id ante eget nunc aliquet viverra. 
\t\t\t\tMaecenas consequat mauris eu metus volutpat, 
\t\t\t\teu vehicula libero pretium. Suspendisse aliquet, 
\t\t\t\tmassa tincidunt euismod semper, arcu ligula varius nunc, 
\t\t\t\tnec interdum lacus nunc et mauris. Mauris at lobortis dolor, 
\t\t\t\taliquam vehicula lacus. Vestibulum gravida, dui vitae aliquam ultricies, 
\t\t\t\tex justo congue ante, ornare consectetur eros nibh vitae felis. 
\t\t\t\tCras convallis vel erat eu suscipit. Praesent porttitor porttitor ligula et dignissim. 
\t\t\t\tAliquam nibh felis, finibus ut dolor eu, suscipit dignissim velit. Integer quis nunc quis sem porttitor iaculis vestibulum vitae erat.
\t\t\t\tAenean lobortis rutrum facilisis. </p>
\t\t\t</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}GSB Utilitaire{% endblock %}

{% block body %}
<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style>
    

<div class=\"example-wrapper\">
    <h1>Bienvenue sur l'utilitaire GSB</h1>
    <div style=\"text-align: center\">
\t\t\t\t<img class=\"img-fluid\" src=\"https://www.cabinetinfirmierdecines.fr/wp-content/uploads/2019/04/Quels-sont-les-plus-gros-laboratoires-pharmaceutiques-fran%C3%A7ais.jpg\" alt=\"laboratoire pharceutique\"  width=\"1500px\"  height=\"600px\"/>
\t\t\t</div>
\t\t\t<div>
\t\t\t\t<p>Lorem ipsum dolor sit amet, 
\t\t\t\tconsectetur adipiscing elit.
\t\t\t\tNullam quis nunc velit. 
\t\t\t\tSuspendisse lacinia tellus eget ante lobortis, 
\t\t\t\tet consectetur ante consequat. 
\t\t\t\tAliquam id ante eget nunc aliquet viverra. 
\t\t\t\tMaecenas consequat mauris eu metus volutpat, 
\t\t\t\teu vehicula libero pretium. Suspendisse aliquet, 
\t\t\t\tmassa tincidunt euismod semper, arcu ligula varius nunc, 
\t\t\t\tnec interdum lacus nunc et mauris. Mauris at lobortis dolor, 
\t\t\t\taliquam vehicula lacus. Vestibulum gravida, dui vitae aliquam ultricies, 
\t\t\t\tex justo congue ante, ornare consectetur eros nibh vitae felis. 
\t\t\t\tCras convallis vel erat eu suscipit. Praesent porttitor porttitor ligula et dignissim. 
\t\t\t\tAliquam nibh felis, finibus ut dolor eu, suscipit dignissim velit. Integer quis nunc quis sem porttitor iaculis vestibulum vitae erat.
\t\t\t\tAenean lobortis rutrum facilisis. </p>
\t\t\t</div>
{% endblock %}
", "home/index.html.twig", "D:\\PPE3\\Projet\\GSB\\Site\\Beta\\projetGSB-Antoine1\\templates\\home\\index.html.twig");
    }
}
