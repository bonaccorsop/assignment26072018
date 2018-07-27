from haversine import haversine

class HaversineCoverage:

    shoppers = []
    zones = []

    def __init__(self, shoppers = [], zones = []):

        self.shoppers = shoppers
        self.zones = zones

    def __is_in_range(self, coords1 = (), coords2 = ()):
        return haversine(coords1, coords2) < 10

    def get_shoppers_coverage(self):

        cover = []
        zones_count = len(self.zones)

        # Calculate the coverage for each shopper
        for shop in self.shoppers:
            in_range_count = 0
            for zone in self.zones:
                in_range_count += 1 if self.__is_in_range((shop['lat'], shop['lng']), (zone['lat'], zone['lng'])) else 0
            cover.append({ 'shopper_id': shop['id'], 'coverage': (in_range_count * 100) / zones_count })

        # Sorting the result
        cover.sort(cmp=None, key=lambda x: x['coverage'], reverse=True)

        return cover


