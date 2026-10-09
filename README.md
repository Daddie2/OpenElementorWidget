# OpenElementorWidget

A custom plugin for the Elementor page builder that adds an **OpenWidget** category with four widgets for showing posts, text and images with hover effects.

**Current version:** 2.0 · **Author:** Davide Antonica

## Widgets

| Widget | What it does |
| --- | --- |
| [Article](#article) | A grid of post cards with category filter buttons, search and custom redirects |
| [Latest Posts Hover](#latest-posts-hover) | The latest posts as cards with a hover effect |
| [Animated Text](#animated-text) | A rounded button-like text block whose background slides on hover |
| [Image Hover](#image-hover) | A circular card that combines two images with a hover effect |

All widgets appear in the Elementor editor under the **OpenWidget** category.

### Article

A responsive grid of post cards, built for pages that list many articles.

- Show the latest N posts, or switch on **All post** to list every post
- **Include / exclude categories**, and hide chosen categories from the card badge
- **Category filter buttons** above the grid, with a customisable "All" button
- **Search box**, matching the title only or the title and content
- Cards with image (with a default image as fallback), category badge, date, tags, title, excerpt and a **Read more** button
- Categories with a "+" toggle when a post has more than one
- **Custom redirects**: send a category, date or tag link to a page of your choice, which can itself contain an Article widget
- Filtering through URL parameters: `Article-category`, `Article-date` (year, `YYYY/MM/DD` or `YYYY/MMm` for a month) and `Article-tag`, with a reset button for active filters
- Customisable "no post found" message
- Separate style controls for the card, image, title, date, tag, category, content, buttons and search box

### Latest Posts Hover

Displays the latest posts as cards with a hover effect.

- Number of posts and category filter
- Style sections for the title, date, tag, category, content, category filter buttons and search
- Customisable message when no post is found

### Animated Text

A centred, rounded text block with a background made of two colours that slides across on hover.

- Text, width, font size and font family
- Left and right background colours
- Text colour and text colour on hover
- Text shadow (colour, horizontal and vertical offset, blur)

### Image Hover

A circular card built from two images, with a hover effect.

- Image 1 (cover) and Image 2 (character)
- Circle size

## Installation

1. Download the latest `OpenElementorWidget.zip` from the [Releases](../../releases) page.
2. In WordPress go to **Plugins → Add New → Upload Plugin**, choose the zip and install it.
3. Activate **OpenElementorWidget** from the **Plugins** menu.
4. Open a page with Elementor and look for the **OpenWidget** category in the widget panel.

To install manually, upload the `OpenElementorWidget` folder to `/wp-content/plugins/` and activate it.

**Requirements:** WordPress and the Elementor plugin.

## Usage

Drag one of the widgets into a section and use the panel on the left to set content and style. Save the page and preview it.

For the Article widget, a common setup is a page that contains an Article widget with **All post** switched on. Choose that page in **Select Page** on your other Article widgets, and their category, date and tag links will open the full list already filtered.

## Releases

Every push to `main` that changes more than documentation files builds a zip of the plugin and publishes a new release automatically. The workflow is in `.github/workflows/release.yml`.

## FAQ

**Can I use this plugin with other themes?**
Yes, it works with any WordPress theme compatible with Elementor.

**Can I customise the widget style?**
Yes, every widget has style controls in the Elementor panel.

**Can I choose which categories to show?**
Yes. The Article and Latest Posts Hover widgets have settings to include or exclude specific categories.

## Contributing

Contributions are welcome. If you have suggestions or bug reports, please open an issue on GitHub.

## License

GPL v2 or later.

## Credits

Developed by [Daddie2](https://github.com/Daddie2).
