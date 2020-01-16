wp.domReady( () => {
  wp.blocks.unregisterBlockType( 'core/quote' );
  wp.blocks.unregisterBlockType( 'core/pullquote' );
  wp.blocks.unregisterBlockType( 'core/gallery' );

  // wp.blocks.registerBlockStyle( 'core/heading', {
  //   name: 'default',
  //   label: 'Default (Lato)',
  //   isDefault: true,
  // } );
  //
  // wp.blocks.registerBlockStyle( 'core/heading', {
  //   name: 'alt',
  //   label: 'Merriweather',
  // } );



  // wp.blocks.registerBlockStyle( 'core/cover', {
  //   name: 'cover',
  //   label: 'Regular Width Cover'
  // } );
  //
  // wp.blocks.registerBlockStyle( 'core/cover', {
  //   name: 'full-width-cover',
  //   label: 'Full Width Cover'
  // } );



  wp.blocks.registerBlockStyle( 'core/image', {
    name: 'image',
    label: 'Regular Width Image'
  } );

  wp.blocks.registerBlockStyle( 'core/image', {
    name: 'full-width-image',
    label: 'Full Width Image'
  } );

  //wp.blocks.unregisterBlockType( 'core/button' );
	// wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	// wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	// wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
} );
