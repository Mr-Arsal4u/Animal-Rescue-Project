import { Switch, Route, useLocation } from "wouter";
import { queryClient } from "./lib/queryClient";
import { QueryClientProvider } from "@tanstack/react-query";
import { Toaster } from "@/components/ui/toaster";
import { TooltipProvider } from "@/components/ui/tooltip";
import NotFound from "@/pages/not-found";
import Home from "@/pages/home";
import Animals from "@/pages/animals";
import Stories from "@/pages/stories";
import Process from "@/pages/process";
import SuperAdminLogin from "@/pages/superadmin-login";
import SuperAdminDashboard from "@/pages/superadmin-dashboard";
import Navigation from "@/components/layout/navigation";
import Footer from "@/components/layout/footer";

function Router() {
  const [location] = useLocation();
  
  // Check if current route is a superadmin route
  const isSuperAdminRoute = location.startsWith('/superadmin');
  
  return (
    <Switch>
      <Route path="/" component={Home} />
      <Route path="/animals" component={Animals} />
      <Route path="/stories" component={Stories} />
      <Route path="/process" component={Process} />
      <Route path="/superadmin/login" component={SuperAdminLogin} />
      <Route path="/superadmin/dashboard" component={SuperAdminDashboard} />
      <Route component={NotFound} />
    </Switch>
  );
}

function App() {
  const [location] = useLocation();
  
  // Check if current route is a superadmin route
  const isSuperAdminRoute = location.startsWith('/superadmin');

  return (
    <QueryClientProvider client={queryClient}>
      <TooltipProvider>
        <div className="min-h-screen flex flex-col">
          {!isSuperAdminRoute && <Navigation />}
          <main className={`flex-1 ${!isSuperAdminRoute ? 'pt-16' : ''}`}>
            <Router />
          </main>
          {!isSuperAdminRoute && <Footer />}
        </div>
        <Toaster />
      </TooltipProvider>
    </QueryClientProvider>
  );
}

export default App;
