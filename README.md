# WordPress Slider Block

A high-performance, static-generated slider block for WordPress Gutenberg editor. Built with modern WordPress best practices and vanilla JavaScript for optimal performance.

## Features

- ✅ **Static HTML Generation** - No runtime dependencies, pure HTML/CSS/JS
- ✅ **Gutenberg Native** - Built using `@wordpress/scripts` and block API v3
- ✅ **Performance Optimized** - Vanilla JS, lazy loading, minimal footprint
- ✅ **Fully Customizable** - Add/remove slides, reorder, multiple settings
- ✅ **Responsive Design** - Mobile-friendly with touch/swipe support
- ✅ **Accessibility** - ARIA labels, keyboard navigation, reduced motion support
- ✅ **SEO Friendly** - Semantic HTML, proper image attributes

## Settings

### Slider Settings
- **Autoplay** - Enable/disable automatic slide transitions
- **Autoplay Speed** - Time between slides (1000-10000ms)
- **Transition Speed** - Animation duration (100-2000ms)
- **Height** - Custom CSS height value (e.g., 500px, 50vh)
- **Show Navigation Arrows** - Display prev/next buttons
- **Show Dots** - Display slide indicators
- **Infinite Loop** - Seamlessly loop back to first slide
- **Pause on Hover** - Stop autoplay when hovering

### Per-Slide Settings
- **Image** - Upload slide background image
- **Title** - Rich text slide title
- **Description** - Rich text slide description
- **Button Text** - Optional CTA button text
- **Button URL** - CTA button link

## Installation

1. Upload the `slider-block` folder to `/wp-content/plugins/`
2. Navigate to the plugin directory:
   ```bash
   cd wp-content/plugins/slider-block
   ```
3. Install dependencies:
   ```bash
   npm install
   ```
4. Build the block:
   ```bash
   npm run build
   ```
5. Activate the plugin through WordPress admin

## Development

### Start Development Mode
```bash
npm start
```

### Build for Production
```bash
npm run build
```

### Linting
```bash
npm run lint:js
npm run lint:css
```

### Create Plugin ZIP
```bash
npm run plugin-zip
```

## Usage

1. Edit a post or page in WordPress
2. Click the **+** button to add a block
3. Search for "Slider" or find it under **Media**
4. Click **+ Add Slide** to add more slides
5. Configure each slide:
   - Upload an image
   - Add title and description
   - Add optional button with link
6. Adjust slider settings in the right sidebar
7. Use the slide tabs to switch between slides
8. Reorder slides using the arrow buttons
9. Remove slides with the Remove button

## File Structure

```
slider-block/
├── build/                 # Built files (generated)
├── src/
│   ├── block.json        # Block metadata
│   ├── index.ts          # Block registration
│   ├── edit.ts           # Editor component
│   ├── save.ts           # Save component (static HTML)
│   ├── view.ts           # Frontend JavaScript
│   ├── style.scss        # Frontend styles
│   └── editor.scss       # Editor styles
├── slider-block.php      # Main plugin file
├── package.json          # Node dependencies
└── README.md            # Documentation
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## WordPress Requirements

- WordPress 6.0+
- PHP 7.4+
- Node.js 18+ (for development)

## Performance Features

- **Static HTML Generation** - All markup rendered server-side
- **Lazy Loading** - Images loaded progressively (first slide eager, rest lazy)
- **Vanilla JavaScript** - No jQuery or heavy frameworks
- **Minimal CSS** - Optimized, critical styles only
- **Conditional Loading** - Scripts only load when block is present
- **Touch Optimized** - Native swipe support
- **Visibility API** - Pauses when tab is inactive

## Customization

### Styling

Edit `src/style.scss` to customize the appearance:

```scss
.slider-block-slide-title {
  font-size: 3rem;
  color: #fff;
  // Your custom styles
}
```

### Functionality

Extend `src/view.ts` to add custom behaviors:

```javascript
class SliderBlock {
  init() {
    // Add your custom initialization
    super.init();
    this.customFeature();
  }
  
  customFeature() {
    // Your custom code
  }
}
```

## Hooks & Filters

### PHP Filters

```php
// Modify default slide attributes
add_filter('slider_block_default_slide', function($slide) {
  $slide['height'] = '600px';
  return $slide;
});
```

## Troubleshooting

### Block not appearing in editor
- Ensure plugin is activated
- Run `npm run build` to compile assets
- Clear browser cache

### Slides not transitioning
- Check browser console for JavaScript errors
- Ensure jQuery is not conflicting
- Verify `view.ts` is loading

### Images not displaying
- Check image URLs in the generated HTML
- Verify upload permissions
- Check for Content Security Policy issues

## Contributing

Contributions are welcome! Please follow WordPress coding standards and test thoroughly before submitting pull requests.

## License

GPL-2.0-or-later

## Support

For issues and feature requests, please use the GitHub issues page or WordPress.org support forums.

## Credits

Built with [@wordpress/scripts](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/) and following [WordPress Block Editor Handbook](https://developer.wordpress.org/block-editor/) best practices.
