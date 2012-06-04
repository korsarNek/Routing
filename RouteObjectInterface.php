<?php

namespace Symfony\Cmf\Component\Routing;

/**
 * Documents for entries in the routing table need to implement this interface
 * in addition to extending Symfony\Component\Routing\Route for the symfony router
 * so the DoctrineRouter can handle them.
 *
 * Some fields in defaults have a special meaning in the getDefaults(). In addition
 * to the constants defined in this class, _locale and _controller are also used.
 */
interface RouteObjectInterface
{
    /**
     * Constant for the field that is given to the ControllerAliasMapper.
     * The value must be configured in the controllers_by_alias mapping.
     *
     * This is ignored if a _controller default value is provided as well
     */
    const CONTROLLER_ALIAS = '_controller_alias';

    /**
     * An explicit template to be used with this route.
     * i.e. SymfonyCmfContentBundle:StaticContent:index.html.twig
     */
    const TEMPLATE_NAME = '_template';

    /**
     * Get the content document this route entry stands for. If non-null,
     * the ControllerClassMapper uses it to identify a controller and
     * the content is passed to the controller.
     *
     * If there is no specific content for this url (i.e. its an "application"
     * page), may return null.
     *
     * To interoperate with the standard Symfony\Cmf\Bundle\ContentBundle\Document\StaticContent
     * the instance MUST store the property in the field <code>routeContent</code>
     * to have referrer resolution work.
     *
     * @return object the document or entity this route entry points to
     */
    function getRouteContent();
}